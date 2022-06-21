<?php

namespace App\DataFixtures;

use App\Entity\Advice;
use App\Entity\Recipe;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadUsers($manager);
        $this->loadAdvice($manager);
        $this->loadRecipes($manager);
    }

    public function loadRecipes(ObjectManager $manager)
    {
        $user1 = $this->getReference('user_1');
        $user2 = $this->getReference('user_2');

        $recipe = new Recipe();
        $recipe->setTitle("Pile na soli");
        $recipe->setIngredients("1 pile, 1/2 - 1 kg soli");
        $recipe->setSteps("1. Ukljucite rernu na 200 C. 2. U tepsiju ulijte soli, toliko da pokrije cijelu povrsinu. Na sredinu polegnite pile, sa prsima na soli. Pecite 30 - 40 minuta, dok ne porumeni. Probajte probosti viljuskom da vidite kada je peceno.");
        $recipe->setTimeToEat("Ručak");
        $recipe->setAuthor($user1);
        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Kokoš ili jaje");
        $recipe->setIngredients("sunka/slanina, jaja, sir");
        $recipe->setSteps("1. U kalup za muffine na dno stavite po 2 snite sunke po zelji, kod mene su to bile kuhana vratina i pureca u ovitku. Posto je sunka sama po sebi masna nema potrebe stavljati dodatnu masnocu ili kosaricu. 2. Sa sunkom dobijete oblik kosarice i u to dodajte sto god zelite. Kod mene je to bilo cijelo jaje u jedan dio, a u drugi samo kockice gauda sira. 3. Sve zacinite i pecite na 200° samo par minuta dok jaje ne bude dovoljno kuhano/peceno, po vasem ukusu.");
        $recipe->setCompany("BIOVITA");
        $recipe->setTimeToEat("Doručak/ručak");
        $recipe->setAuthor($user1);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Batakusa");
        $recipe->setIngredients("2 jajeta, 150 ml mlijeka, 100 g brasna, prstohvat soli, 1 kasika kisele pavlake, 50 ml mlijeka");
        $recipe->setSteps("1. Zacinite batkove po zelji (so, vegeta, biber, crvena paprika) pa ispecite na ulju u tavi da porumene sa obje strane.  2. Od ostalih sastojaka umutite smjesu kao za palacinke (treba biti malo gusca).  3. Zagrijte rernu na 220 C. Tepsiju pouljite i zagrijte pa u nju izlijte tijesto, po vrhu poredajte batkove pa vratite u rernu na pecenje.  4. Pustite da se pece oko pola sata, ali provjeravajte. Pita je gotova kada malo naraste i porumeni, tj. poprimi zlatno-smedjkastu boju. 5. Vrelu pitu mozete preliti zalivom od umucenog mlijeka sa kiselom pavlakom i prstohvatom soli.");
        $recipe->setTimeToEat("Ručak");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Limunada");
        $recipe->setIngredients("2 limuna, 20-25 listica svjeze mente, 2-3 Zlice secera, 4 Case hladne vode");
        $recipe->setSteps("1. U posudu u kojoj cete pripremati sok naribati koricu 2 limuna dodati listice mente prethodno isprane pod vodom i dodati secer, zatim sve zajedno trljati prstima da menta pusti svoju aromu. Dodati hladnu vodu i sok od 2 limuna i mijesati dok se secer ne otopi. Na kraju limunadu procijediti i staviti je hladiti. 2. Po zelji u limunadu na kraju staviti listice mente i kriske limuna uz puno leda");
        $recipe->setCompany("Bio&Bio");
        $recipe->setTimeToEat("Bilo kad");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Grčka juha od leće");
        $recipe->setIngredients("500 g suhe smeđe ili zelene leće, 1,25 l vode, 1 mali luk, 2 češnjaka, 1 žlica Vegete, 125 ml maslinova ulja, 2 Vegeta Maestro lovorova lista, Vegeta Maestro morska sol, Vegeta Maestro crni papar mljeveni");
        $recipe->setSteps("1. Leću properite i ostavite da se namače u vodi 2 sata. Zagrijte vodu u većem loncu pa dodajte ocijeđenu leću, sjeckani luk, protisnuti češnjak, lovorov list i Vegetu. 2. Kuhajte poklopljeno 25 minuta. 3. Dodajte maslinovo ulje, koncentrat rajčice i vinski ocat. Kuhajte oko 15 minuta dok leća ne omekša, a juha ne postane gušća");
        $recipe->setTimeToEat("Ručak/večera");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Tofu s povrćem");
        $recipe->setIngredients("1 tofu, 2 mrkve, 2 mladi luk, 2 cijela jaja");
        $recipe->setSteps("1. Mladi luk izrezati na kolutiće. Mrkvu i tofu naribati na ribež. Na maslinovo ulje na tavi prvo popržiti mladi luk pa potom dodati mrkvu i pustiti da voda ispari iz ne par minuta. Nakon toga dodati tofu i pržiti dok tofu ne dobije boju. Dodati zaćine po želji i nakraju dva umučena jaja da sjedine jelo. Ja volim na kraju dodati malo naribanog sira.");
        $recipe->setTimeToEat("Ručak");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Jogurt kolač s voćem");
        $recipe->setIngredients("3 jaja, 1 casa secera, 1 Vanilin šećer Dolcela, 1 casa jogurta, 1/2 case ulja, 2,5 case brasna, 1/2 kesice Praška za pecivo Docela, ribana kora limina");
        $recipe->setSteps("1. Jaja umutiti sa secerom i vanilinim secerom dok se sav secer ne Istopi Pa dodati Jogurt, ulje, Brasno, prasak za pecivo i Koru limuna. 2. Usuti tjesto u pouljeni kalup, preko raspodjeliti voce po zelji i peci na 180 Stepeni  25-30 Minuta. Ohladjen Kolac posuti sa secerom u prahu. Casa je od 200 ml. ");
        $recipe->setTimeToEat("Nakon ručka");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $manager->flush();
    }

    public function loadAdvice(ObjectManager $manager)
    {
        $user1 = $this->getReference('user_1');
        $user2 = $this->getReference('user_2');

        $advice = new Advice();
        $advice->setTitle("Sir premazan maslacem dulje ostaje svjež");
        $advice->setContent("Kako bi polutvrdi sir dulje ostao svjež i bez pljesni, poslužite se maslacem. Svježe odrezani kraj premažite slojem maslaca i zamotajte u plastičnu foliju.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Kakao i čili odlično se nadopunjuju");
        $advice->setContent("Kad pripremate vrlo ljuto jelo s čilijem u prahu ili pikantnim papričicama, prije kuhanja dodajte pola žličice kakaa u prahu koji će pružiti finu aromu.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Banana i jabuka za mekše pečenje");
        $advice->setContent("U posudu s pečenjem stavite zrelu, oguljenu bananu. Tako će meso biti mekše, a kako bi bilo sočnije, ubacite i jabuku narezanu na kockice.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Pazite da se tjestenina ne raskuha u juhi");
        $advice->setContent("Kupovno tijesto za juhu omekša već od samog stajanja u vreloj vodi. Ako juhu ne namjeravate poslužiti odmah, upotrijebite domaću tjesteninu ili noklice.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Tjestenini treba mjesta da se kvalitetno skuha");
        $advice->setContent("Kuhanje u premalo vode tjesteninu čini ljepljivom i gumenastom bez obzira na to je li riječ o špagetima ili tjestenini za juhu. Zato uvijek koristite veliku posudu i puno vode.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Začini u mlinac za kavu");
        $advice->setContent("Mučite li se s usitnjavanjem začina i sjemenki? Mislite da ćete to obaviti u mužaru, ali samo vam leti na sve strane. Iskoristite mlinac za kavu koji je završio u zapećku u mnogim obiteljima. Ne meljite ih previše, jer se arome brzo gube, a jednom samljevene spremite u male kutijice.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Led protiv masnoće");
        $advice->setContent("Želite li maknuti s površine juhe ili variva suvišnu masnoću, ne morate više stajati dugo nad loncem i hvatati je žlicom s kojom vrlo malo uhvatimo. Najbolje je ubaciti kockicu, dvije leda koje će skrutiti masoću i mnogo ćete je lakše ukloniti.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Limun i limeta: iscijedi pa zamrzni");
        $advice->setContent("Ako su vam limun ili limeta koje čuvate u hladnjaku počeli poprimati smeđe mrljice ili se sušiti, iscijedite sok i zamrznite ga. Tako ćete ga imati pri ruci kad vam zatreba, a nećete morati bacati limun i limete koje niste iskoristili.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Od ostataka se pravi temeljac");
        $advice->setContent("Riblje glave, kosti, repne peraje nisu dobre za jelo, no od njih se pravi odličan temeljac - kuhajte ga s malo prešina, celera i lovora.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $manager->flush();
    }

    public function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('horvat123');
        $user->setFirstname('Ivan');
        $user->setLastname('Horvat');
        $user->setEmail('ivan@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'sifra123'));

        $this->addReference('user_1', $user);

        $manager->persist($user);

        $user = new User();
        $user->setUsername('mihicPRO');
        $user->setFirstname('Mihael');
        $user->setLastname('Benja');
        $user->setEmail('mihael@gmail.com');
        $user->setPassword($this->passwordHasher->hashPassword($user, 'sifra456'));

        $this->addReference('user_2', $user);

        $manager->persist($user);

        $manager->flush();
    }
}
