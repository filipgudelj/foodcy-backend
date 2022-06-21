<?php

namespace App\Controller;

use App\Entity\Recipe;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @Route("/recipes")
 */
class RecipeController extends AbstractController
{
    private ManagerRegistry $doctrine;

    public function __construct(ManagerRegistry $doctrine){
        $this->doctrine = $doctrine;
    }
    /**
     * @Route("/{page}", name="recipe_list", defaults={"page": 5}, requirements={"page"="\d+"})
     */
    public function list($page, Request $request)
    {
        $limit = $request->get('limit', 10);

        $repository = $this->doctrine->getRepository(Recipe::class);
        $items = $repository->findAll();

        return $this->json([
            'page' => $page,
            'limit' => $limit,
            'data' => array_map(function ($item){
                return $this->generateUrl('recipe_by_id', ['id' => $item->getId()]);
            }, $items)
        ]);
    }

    /**
     * @Route("/recipe/{id}", name="recipe_by_id", requirements={"id"="\d+"}, methods={"GET"})
     */
    public function recipe($id)
    {
        return $this->json(
            $this->doctrine->getRepository(Recipe::class)->find($id)
        );
    }

    /**
     * @Route("/recipe/add", name="recipe_add", methods={"POST"})
     */
    public function add(Request $request){
        $normalizer = [new ObjectNormalizer()];
        $encoder = [new JsonEncoder()];

        $serializer = new Serializer($normalizer, $encoder);

        $recipe = $serializer->deserialize($request->getContent(), Recipe::class, 'json', [
            DenormalizerInterface::COLLECT_DENORMALIZATION_ERRORS => true,
        ]);
        $em = $this->doctrine->getManager();
        $em->persist($recipe);
        $em->flush();

        return $this->json($recipe);
    }

    /**
     * @Route("/recipe/{id}", name="recipe_delete", methods={"DELETE"})
     */
    public function delete(Recipe $recipe){
        $em = $this->doctrine->getManager();

        $em->remove($recipe);
        $em->flush();

        return new JsonResponse(null, JsonResponse::HTTP_NOT_FOUND);
    }
}