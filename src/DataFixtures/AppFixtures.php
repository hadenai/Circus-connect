<?php


namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Circus;
use App\Entity\Clown;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $category = new Category();
        $category->setTitle('humour juif');
        $this->addReference("category1", $category);
        $manager->persist($category);

        $category1 = new Category();
        $category1->setTitle('humour noir');
        $this->addReference("category2", $category1);
        $manager->persist($category1);

        $category2 = new Category();
        $category2->setTitle('humour décalé');
        $this->addReference("category3", $category2);
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setTitle('humour absurde');
        $this->addReference("category4", $category3);
        $manager->persist($category3);

        $category4 = new Category();
        $category4->setTitle('humour anglais');
        $this->addReference("category5", $category4);
        $manager->persist($category4);

        $category5 = new Category();
        $category5->setTitle('humour salace');
        $this->addReference("category6", $category5);
        $manager->persist($category5);

        for ($i = 1; $i <= 12; $i++) {
            $circus = new Circus();
            $circus->setName($faker->word)
                ->setSlug($faker->word)
                ->setEmail($faker->email)
                ->setVille($faker->city)
                ->setPassword($faker->password())
                ->setDescription($faker->text)
                ->setImage($faker->imageUrl('211', '211', 'city'));

            $manager->persist($circus);

            for ($j = 1, $jMax = mt_rand(4, 6); $j <= $jMax; $j++) {
                $clown = new Clown();
                $clown->setFirstName($faker->firstNameFemale)
                    ->setLastName($faker->lastName)
                    ->setEmail($faker->email)
                    ->setVille($faker->city)
                    ->setPassword($faker->password())
                    ->setImage($faker->imageUrl('211', '211', 'people'))
                    ->addCircus($circus)
                    ->setCategory($this->getReference("category".random_int(1, 6)));

                $manager->persist($clown);
            }
        }
        $manager->flush();
    }
}