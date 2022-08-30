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
        $recipe->setTitle("Whole-Grain Waffles");
        $recipe->setIngredients("
        1 (1/4-ounce) package active dry yeast,
        1/2 cup warm water (105 to 110 degrees),
        2 cups buttermilk,
        3 tablespoons peanut oil,
        2 tablespoons sugar,
        2 cups whole-wheat pastry flour,
        1/2 cup rolled oats,
        4 large egg whites,
        1/8 teaspoon baking soda,
        1/4 teaspoon fine salt,
        Cooking spray for waffle iron
        ");
        $recipe->setSteps("Sprinkle the yeast over the water in a large mixing bowl; let stand until foamy, about 5 minutes. Add the buttermilk, oil, sugar and flour and whisk until smooth. Cover the bowl with plastic wrap and refrigerate overnight. Preheat a waffle iron. Whisk the oats, egg whites, baking soda, and salt into the waffle batter until smooth. Lightly mist the hot waffle iron with cooking spray. Add about 1/3 cup of batter to each section, using the back of a spoon to spread batter to the edges. Cook until the waffles are crisp and golden brown, 5 to 7 minutes. Repeat with the remaining batter. Serve with maple syrup.");
        $recipe->setTimeToEat("Breakfast");
        $recipe->setAuthor($user1);
        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Blueberry Whole Wheat Muffins");
        $recipe->setIngredients("
        1 1/2 cups whole wheat pastry flour or white whole wheat flour,
        1/2 cup rolled oats,
        1 teaspoon baking powder,
        1/2 teaspoon fine salt,
        1/4 teaspoon baking soda,
        1/2 cup vegetable oil,
        1/2 cup reduced-fat sour cream,
        1/2 cup packed light brown sugar,
        1 teaspoon finely grated lemon zest,
        1 teaspoon pure vanilla extract,
        2 large eggs,
        1 cup blueberries,
        Muscavado sugar
        ");
        $recipe->setSteps("Preheat the oven to 108°C. Line a 12-cup muffin pan with muffin liners. Combine the flour, oats, baking powder, salt and baking soda in a large bowl. Whisk together the vegetable oil, sour cream, brown sugar, lemon zest, vanilla and eggs in another bowl. Fold the sour cream mixture into the flour mixture until just combined, and then fold in the blueberries (don't worry if there are a few lumps). Divide evenly among the prepared muffin pan. Sprinkle with oats and demerara sugar if using. Bake until the muffins are golden and a toothpick inserted in the center comes out clean, 20 to 24 minutes. Cool in the pan for a few minutes, and then transfer to a rack to cool completely.");
        $recipe->setCompany("Cardinal Health");
        $recipe->setTimeToEat("Breakfast");
        $recipe->setAuthor($user1);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Asian Lettuce Wraps");
        $recipe->setIngredients("
        2 tsps vegetable oil,
        450g beef mince,
        5cm piece ginger,
        2 spring onions,
        2 cloves garlic,
        30ml soy sauce,
        1 tsp red pepper flakes,
        60ml hoisin sauce,
        30g chopped peanuts,
        Salt and freshly ground black pepper,
        1 head Boston lettuce
        ");
        $recipe->setSteps("In a skillet over medium-high heat, add the vegetable oil and saute beef until brown. Stir in ginger, spring onions, garlic, soy sauce, red pepper flakes and hoisin and cook for 1 minute. Remove from the heat and stir in the peanuts. Season with salt and pepper and serve warm wrapped in lettuce cups.");
        $recipe->setTimeToEat("Lunch");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Healthy Carrot Muffins");
        $recipe->setIngredients("
        3/4 cup plain flour,
        1/2 cup whole wheat flour,
        2/3 cup dark brown sugar,
        2 teaspoons ground cinnamon,
        1 teaspoon baking powder,
        1/2 teaspoon baking soda,
        Pinch fine salt,
        2 large eggs,
        1/3 cup vegetable oil,
        1 tablespoon pure vanilla extract,
        4 medium carrots,
        1/2 cup tinned pineapple
        ");
        $recipe->setSteps("Preheat the oven to 350 degrees F. Line twelve 1/2-cup muffin cups with paper muffin liners. Whisk the flours with the brown sugar, wheat germ, cinnamon, baking powder, baking soda, and salt in a medium bowl. In another medium bowl lightly whisk the egg, then whisk in the vegetable oil, and vanilla extract. Quickly and lightly fold the wet ingredients into the dry ingredients with a rubber spatula. Stir in the carrots and pineapple just until evenly moist; the batter will be very thick. Divide the batter evenly among the muffin cups. Bake until golden and a toothpick inserted in the centers comes out clean, about 30 minutes. Turn muffins out of the tins and cool on a rack. Serve warm.");
        $recipe->setCompany("Walgreens Boots Alliance");
        $recipe->setTimeToEat("Snack");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Courgette Ribbon Pasta");
        $recipe->setIngredients("
        340g wholemeal fettuccini,
        2 medium green courgettes (about 450g),
        2 medium yellow courgettes (about 450g),
        3 tbsp olive oil,
        4 cloves garlic,
        240ml low-sodium vegetable stock,
        25g grated Parmesan, plus 15g or vegetarian alternative,
        15g finely minced parsley leaves,
        35g thinly sliced basil leaves,
        1/2 tsp red pepper flakes,
        1/2 tsp fresh ground black pepper,
        Salt
        ");
        $recipe->setSteps(" In a large pasta pot, cook pasta al dente, 1 or 2 mins less than the package instructions call for. Drain. Meanwhile, slice off ends of courgettes and discard. Cut courgettes in half lengthwise. Using a mandoline, or carefully with a sharp knife, slice zucchini into very thin (about 0.25cm) slices, trying to keep some skin on each piece for color. Stack slices and cut in half lengthwise. Reserve courgette ribbons in a large bowl. In the pasta pot, heat the olive oil over low-medium heat. Add garlic and cook until soft and translucent but not browned, about 1 min. Add courgette ribbons and 65ml stock, raise heat to medium-high and cook until courgette is still somewhat firm but just cooked, about 3 mins. Return pasta to pot and add remaining stock; cook for 2 to 3 mins, until liquid has mostly absorbed into the pasta. Add 25g of the Parmesan, parsley, basil, red pepper flakes, black pepper and toss to combine. Season with salt, to taste. Serve garnished with additional parsley, basil and the remaining 15g of cheese.");
        $recipe->setTimeToEat("Lunch");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Tenderstem Broccoli, Summer Pea and Mint Soup");
        $recipe->setIngredients("
        1 tbsp olive oil,
        25g butter,
        1 medium white onion finely chopped,
        1 garlic clove peeled and finely chopped,
        400ml chicken stock,
        400g shelled peas,
        100g Tenderstem broccoli florets,
        Juice of 1 lemon,
        Salt and cracked black pepper
        ");
        $recipe->setSteps("Melt the oil and the butter, add the onion and garlic and cook over a gentle heat until soft, about 10 minutes. Add the chicken stock and bring to the boil, add the peas and Tenderstem and cook until they are soft (about 5 minutes). Remove half of the soup and blend in a food processor then add back into the rest of the soup. Add lemon juice, season with salt and pepper. Stir in mint. Serve in warmed bowls drizzled with extra virgin olive oil.");
        $recipe->setTimeToEat("Lunch");
        $recipe->setAuthor($user2);

        $manager->persist($recipe);

        $recipe = new Recipe();
        $recipe->setTitle("Pasta with Pecorino and Pepper");
        $recipe->setIngredients("
        1 tbsp whole black Tellicherry peppercorns,
        Salt,
        250g dried Italian egg pasta,
        100g freshly grated aged Pecorino cheese,
        30ml double cream,
        15g unsalted butter,
        2 tbsp minced fresh parsley leaves
        ");
        $recipe->setSteps("Place the peppercorns in a mortar and pestle and crush them until you have a mixture of coarse and fine bits. (You can also grind them in a small food mill or coffee grinder.) Set aside. Fill a large, heavy-bottomed pot with water and bring to a boil over high heat. Add 1 tbsp salt and the pasta and cook according to the directions on the package until al dente. Ladle 250ml of the pasta cooking water into a glass measuring cup and reserve it. Drain the pasta quickly in a colander and return the pasta to the pot with a lot of the pasta water still dripping. Working quickly, with the heat on very low, toss the pasta with 50g of the grated pecorino, the crushed peppercorns, cream, butter, parsley and 1 tsp salt, tossing constantly. If the pasta seems dry, add some of the reserved cooking water. Off the heat, toss in the remaining 50g Pecorino. Serve immediately with a big bowl of extra grated pecorino for sprinkling. ");
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
        $advice->setTitle("Be Clean");
        $advice->setContent("Set up your workspace by gathering clean tools, bowls and utensils. And make sure to keep a trashcan within arm’s reach.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Peel Tomatoes With Ease");
        $advice->setContent("Cut an X in the top, and then simmer in a pot of hot water for 15 to 30 seconds. Cool down and the skin will fall right off.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Baking Scale");
        $advice->setContent("Scales are not only an accurate way to measure your cooking ingredients, but they streamline the entire process.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Embrace Salt");
        $advice->setContent(" Don’t be afraid to use salt; it pulls the flavors out of your dishes. Cook with kosher salt and season with sea salt.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Ignore Cooking Times");
        $advice->setContent("Check your dishes by using your own senses (smell, taste, touch) to decide when they are done.");
        $advice->setAuthor($user1);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Eggs");
        $advice->setContent("Crack eggs on a paper towel on the counter — no shells and easy cleanup!");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Prevent Tears");
        $advice->setContent("To prevent tears, cut off the root of the onion before you slice.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Simple Syrup");
        $advice->setContent("Create simple syrup by simmering 1 cup of water and 1 cup of sugar in a medium heated pot until the sugar dissolves. Bottle and store in your refrigerator for up to 2 weeks.");
        $advice->setAuthor($user2);

        $manager->persist($advice);

        $advice = new Advice();
        $advice->setTitle("Chilli Peppers");
        $advice->setContent("When cooking with chili peppers, protect your hands and eyes by wearing rubber gloves. Or coat your hands in vegetable oil and wash them with soap and water immediately after handling.");
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
