<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Type;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = [
            [
              'title'=> 'Yakuza',
              'developer'=> 'RGG Studio',
              'description'=> 'Il gioco introduce il protagonista Kazuma Kiryu, un ex yakuza che emerge dal carcere per scoprire che il suo mondo è cambiato. Inizia a esplorare la sua innocenza e il conflitto tra le sue scelte passate e il desiderio di una vita normale.',
              'release_date'=> '2005-12-08',
              'image'=>''
            ],
            [
             'title'=> 'Yakuza 2',
             'developer'=> 'RGG Studio',
             'description'=> 'Kiryu cerca di proteggere il suo amico e il suo nuovo mondo da una guerra tra bande. Questo episodio raffina la formula di gioco e aggiunge nuove meccaniche, come le battaglie con i boss.',
             'release_date'=> '2006-12-07',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza 3',
             'developer'=> 'RGG Studio',
             'description'=> 'Ambientato a Okinawa, Kiryu gestisce un orfanotrofio. La storia esplora temi di famiglia e redenzione mentre Kiryu è nuovamente attratto nelle faide yakuza.',
             'release_date'=> '2009-02-26',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza 4',
             'developer'=> 'RGG Studio',
             'description'=> 'Introduce più protagonisti giocabili, ognuno con la propria storia e motivazioni. La narrazione si interseca tra i personaggi, offrendo una visione più ampia della criminalità organizzata.',
             'release_date'=> '2010-03-18',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza 5',
             'developer'=> 'RGG Studio',
             'description'=> 'Ritorna a un cast di personaggi multidimensionali e trama complicata. Kiryu, Goro Majima e altri protagonisti affrontano diverse sfide in differenti città giapponesi.',
             'release_date'=> '2012-12-05',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza 6: The Song Of Life',
             'developer'=> 'RGG Studio',
             'description'=> ' Conclude la storia di Kiryu, portandolo in un viaggio emotivo per proteggere la sua famiglia e scoprire il suo passato.',
             'release_date'=> '2016-12-08',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza: Like a Dragon',
             'developer'=> 'RGG Studio',
             'description'=> 'Introduce un nuovo protagonista, Ichiban Kasuga, e cambia il sistema di combattimento in un RPG a turni. La storia esplora temi di amicizia, fede e redenzione.',
             'release_date'=> '2020-01-16',
             'image'=>''
           ],
           [
             'title'=> 'Like a Dragon Gaiden: The Man Who Erased His Name',
             'developer'=> 'RGG Studio',
             'description'=> 'Questa nuova entrata esplora il periodo tra "Yakuza 6: The Song of Life" e "Yakuza: Like a Dragon", approfondendo la vita di Kiryu dopo aver assunto una nuova identità per sfuggire al suo passato. I giocatori possono aspettarsi una combinazione di combattimenti intensi, elementi di role-playing e una narrativa profonda che esplora temi di redenzione e identità. Il gioco offre anche nuove meccaniche e due stili di combattimento distintivi, permettendo ai giocatori di vivere un\'esperienza unica all\'interno dell\'universo di "Yakuza".',
             'release_date'=> '2023-11-09',
             'image'=>''
           ],
           [
             'title'=> 'Like a Dragon: Infinite Wealth',
             'developer'=> 'RGG Studio',
             'description'=> 'Questa iterazione continua a seguire Ichiban Kasuga nelle sue avventure, apportando ulteriori innovazioni al gameplay e sviluppi narrativi, mantenendo però l\'essenza che ha reso famosa la serie.',
             'release_date'=> '2024-01-25',
             'image'=>''
           ],
           [
             'title'=> 'Yakuza 0',
             'developer'=> 'RGG Studio',
             'description'=> 'Prequel della serie, offre il background di Kazuma Kiryu e Goro Majima. È molto apprezzato per la sua profonda caratterizzazione e l\'atmosfera degli anni \'80.',
             'release_date'=> '2015-03-12',
             'image'=>''
           ]

        ];

        foreach($projects as $project) {
        $types = Type::all()->pluck('id');

        $newProject= new Project();
        $newProject-> title = $project['title'];
        $newProject-> type_id = $faker->randomElement($types);
        $newProject-> developer = $project['developer'];
        $newProject-> description = $project['description'];
        $newProject-> release_date = $project['release_date'];
        $newProject-> image = $project['image'];
        $newProject-> save();
     }
    }
}
