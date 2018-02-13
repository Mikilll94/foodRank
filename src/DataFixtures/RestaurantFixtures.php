<?php

namespace App\DataFixtures;

use App\Entity\Restaurant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RestaurantFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $restaurants_array = [
            'tutti_santi' => [
                'name' => 'Tutti Santi', 'image' => 'tutti_santi.jpg',
                'short_description' => 'Jedyna w Polsce pizzeria pod patronatem Mistrza Włoch i vice-mistrza świata. Valeria Valle.',
                'description' => 'Mistrzowski smak! Teraz pizza mistrza Włoch w Twoim mieście, a także wprost do Twojego domu. Naszym partnerem jest Valerio Valle, mistrz Włoch w pizzy klasycznej, jeden z najbardziej utytułowanych włoskich pizzaiolo, wielokrotnie nagradzany w międzynarodowych konkursach. Valerio Valle prowadzi regularne szkolenia w zakresie pizzy w Città Sant’ Angelo (PE). Aktualnie zajmuje wysoką pozycję w TOP 25 Włoskich Pizzaioli wg Roberto Piccinelli.'
            ],
            'a_noz_widelec' => [
                'name' => 'A nóż widelec', 'image' => 'a_noz_widelec.jpg',
                'short_description' => 'Odwiedzając "A nóż widelec", wkraczasz w wielowymiarowy świat smaków i aromatów kuchni wielkopolskiej jak również europejskiej.',
                'description' => 'Tutaj tradycja spotyka się z nowoczesnością, prezentując innowacyjną wizję kulinarnego dziedzictwa regionu. Czeka tu na Ciebie karta autorskich dań skomponowanych z bogactwa składników sezonowych, którymi cieszyć się możesz w przytulnie zaaranżowanym wnętrzu.'
            ],
            'weranda_caffe' => [
                'name' => 'Weranda Caffe', 'image' => 'weranda_caffe.jpg',
                'short_description' => 'Ukryta w samym centrum, tuż przy Starym Rynku, jest idealnie przytulna i zachwyca swym urokiem.',
                'description' => 'Jak jednym zdaniem można opisać wszystkie restauracje Weranda Family? To połączenie niespotykanej dziś autentyczności, gościnności, designu oraz smaku serwowanych potraw. Wpadając do nas nawet na chwilę, ma się poczucie bycia we właściwym miejscu. Co nas wyróżnia? Wspólną cechą naszych lokali jest atmosfera – rodzinna, sielska, sprzyjająca spotkaniom. Budujemy ją nie tylko precyzyjnie dopracowanymi daniami i legendarnym, zmieniającym się wraz z porami roku wystrojem (połączeniem zieleni i ręcznie wykonanych ozdób), ale przede wszystkim ludźmi z prawdziwą pasją gotowania i tworzenia czegoś nowego. Każda z naszych restauracji jest inna, jednak wspólnie tworzą spójny koncept WERANDA FAMILY.',
            ],
            'restauracja_papierowka' => [
                'name' => 'Restauracja Papierówka', 'image' => 'restauracja_papierowka.jpg',
                'short_description' => 'Papierówka to zielona odskocznia w centrum miasta. U nas zjesz lekką kuchnię regionalną urozmaiconą sezonowo.',
                'description' => 'Papierówka to zielona odskocznia w centrum miasta. U nas zjesz lekką kuchnię regionalną urozmaiconą sezonowo, odpoczniesz w cieniu parku Zakrzewskiego oraz uraczysz się soczystymi jabłkami. Jesteśmy rodziną i naszą pasją od wielu lat jest gotowanie dla innych, przygotowywane dania przyrządzamy z najlepszych produktów z lokalnych gospodarstw. Starujemy już od 9.00 z pysznymi śniadaniami które dadzą wam energię na cały dzień, zapraszamy również na lunche i obiady. Papierówka to nie tylko smakowite dania ale również świetny wystrój: prosty świeży i przyjazny, już od progu poczęstuj się jabłkiem i rozpocznij przygodę z papierówką.',
            ],
            'restauracja_ratuszova' => [
                'name' => 'Restauracja Ratuszova', 'image' => 'restauracja_ratuszova.jpg',
                'short_description' => 'Restauracja Ratuszova serdecznie zaprasza w swoje progi wszystkich, którzy lubią lub pragną zasmakować tradycyjne potrawy kuchni polskiej!',
                'description' => 'W naszym menu na szczególną uwagę zasługuje czernina z domowym makaronem, kaczka pieczona z jabłkami oraz dania z dziczyzny. Miłośników Slow Food, pasjonatów zdrowego odżywiania oraz wszystkich smakoszy w szczególności zachęcamy do spróbowania dań gotowanych innowacyjną metodą sous-vide. Dla jeszcze większego urozmaicenia nasze menu uzupełniliśmy smakami kuchni międzynarodowej. W naszej restauracji  dbamy o to by sezonowo zmieniać potrawy oraz wystrój sal. Niezmienną natomiast częścią RATUSZOVEJ jest wysoka jakość produktów, których używamy, ich oryginalność oraz miła i profesjonalna obsługa, która wprawi Państwa w wyjątkowy nastrój i zadba aby wizyta była niezapomnianą przygodą zarówno kulinarną jak i towarzyską.'
            ],
            'figaro' => [
                'name' => 'Figaro', 'image' => 'figaro.jpg',
                'short_description' => 'Przez żołądek do serca?  Dlatego trafiło tu wielu!',
                'description' => 'Warto, bo w kulinarny świat wkładamy całe nasze serce, czego odbiciem są potrawy które serwujemy. Wierzymy, że  owoce naszej pasji podane na talerzu i przyprawione z włoską finezją pozwolą zdobyć Tych, na których zależy nam tak bardzo, że zapraszamy Ich do Figaro. Gotowanie bierzemy na siebie, by cała reszta była już prosta. Znakomita kuchnia, wystrój i atmosfera pobudzą wszystkie zmysły. Dbamy o szczegóły, bo jedzenie po włosku to nie tylko wrażenia smakowe, lecz także estetyczne i słuchowe. U nas się je ... rozmawia ... gestykuluje. W Figaro jedzeniem się żyje !',
            ],
            'muga_restauracja' => [
                'name' => 'Muga Restauracja', 'image' => 'muga_restauracja.jpg',
                'short_description' => 'Położona w bezpośredniej okolicy poznańskiego Starego Rynku restauracja MUGA jest idealnym miejscem spotkań osób, które cenią sobie dobrą i dopracowaną kuchnię.',
                'description' => 'Położona w bezpośredniej okolicy poznańskiego Starego Rynku restauracja MUGA jest idealnym miejscem spotkań osób, które cenią sobie dobrą i dopracowaną kuchnię. Gościom proponujemy autorskie kreacje uwzględniające sezonowość oraz europejskie trendy. Szczególną uwagę skupiamy na estetyce podania i harmonijnym łączeniu smaków, dzięki czemu posiłek w MUGA staje się ucztą dla wszystkich zmysłów. Restauracja Muga połączona jest z winiarnią Casa de Vinos , która w swoim portfolio posiada ponad 300 etykiet win z całego świata . Mamy nadzieję, że nasze zaangażowanie oraz doświadczenie zyskają Państwa uznanie. Serdecznie zapraszamy do restauracji MUGA.',
            ],
            'cucina_88' => [
                'name' => 'Cucina 88', 'image' => 'cucina_88.jpg',
                'short_description' => 'W Cucinie można zobaczyć smaki, usłyszeć zapachy i dotknąć świeżości.',
                'description' => 'W Cucinie można zobaczyć smaki, usłyszeć zapachy i dotknąć świeżości. Poczuć tętno Kuchni – bo ona tu żyje. Jesteśmy ludźmi, którzy tę Kuchnię tworzą i naturą, której się podporządkowują. To natura wyznacza bowiem pojawiające się w karcie propozycje. Menu zmienia się wraz z porami roku. Inaczej smakuje lato od jesieni, czego innego potrzebujemy wiosną, czym innym obdarza nas zima. Zdajemy sobie z tego sprawę, dlatego w Cucinie dania są przygotowane wyłącznie ze świeżych, sezonowych produktów. Pragniemy rozpowszechniać ideę „Wiem, Co Jem”, dlatego Goście w naszych delikatesach mogą kupić składniki, na kanwie których powstały ich ulubione posiłki. A przede wszystkim zapytać kucharzy, jak z nich skorzystać. Bo w prawdziwej Kuchni dużo rozmawia się o tym, co nas syci i daje rozkosz.',
            ],
            'restauracja_bamberka' => [
                'name' => 'Restauracja Bamberka', 'image' => 'restauracja_bamberka.jpg',
                'short_description' => 'Restauracja ”Przy Bamberce” znajduje się w sercu Starego Rynku, w miejscu, gdzie przed wiekami mieściły się jadki chlebowe. Słynnymi sąsiadkami restauracji są fontanna Bamberka oraz Waga Miejska.',
                'description' => 'Restauracja ”Przy Bamberce” znajduje się w sercu Starego Rynku, w miejscu, gdzie przed wiekami mieściły się jadki chlebowe. Słynnymi sąsiadkami restauracji są fontanna Bamberka oraz Waga Miejska. Restauracja oferuje dwie sale i loże, znajdujące się na dwóch poziomach, dające poczucie spokoju podczas kolacji przy świecach, jak również przy spotkaniach biznesowych, rodzinnych czy z przyjaciółmi. Ogródek letni oraz zimowy to część zewnętrzna, która oferuje wspaniałą przestrzeń, aby móc chłonąć atmosferę Starego Miasta. Kuchnia oferuje tradycyjne polskie menu. Wybór kaczki, gęsi wraz własnoręcznie robionymi pyzami są naszą specjalnością, lubianą przez Gości, którzy często powtarzają, że są one najlepsze w mieście. Nasze własne pieczywo By jeszcze bardziej zadowolić naszych gości, codziennie wypiekamy świeże pieczywo. Tradycyjne receptury sprawiają, że nasze wypieki smakują wyśmienicie i są idealnym dodatkiem do zup, sałatek i przystawek.',
            ],
            'pyra_bar' => [
                'name' => 'Pyra Bar', 'image' => 'pyra_bar.jpg',
                'short_description' => 'Nasz pierwszy lokal znajduje się na ulicy  Strzeleckiej w Poznaniu. Tak, to samo centrum. W ciepłe dni, proponujemy przesiadywanie na świeżym powietrzu w naszym ogródku, w chłodniejsze - ciepłą  herbatę i grzanie się w lokalu. No i jedzenie, ale to oczywiste.',
                'description' => 'Ziemniaczana pyranoja zaczęła się w marcu 2009 w Poznaniu, kiedy to nieustraszona grupa entuzjastów bulw przyczyniła się do otworzenia pionierskiej placówki gastronomicznej opierającej swoje menu w głównej mierze na PYRACH. Od tego czasu Kurczak Cukinsyn, zBoczek czy poTEJto Korsarza to nasze codzienne wyzwania, na których się koncentrujemy, by jak najlepiej nakarmić naszych Gości. Ale jak jest z pyrą, każdy wie? Za długo poleży w cieple to zaczyna kiełkować. Było więc zatem kwestią czasu otworzenie drugiego baru - w Gdańsku - gdzie w najbliższym otoczeniu starówki, przy ulicy Garbary 7, wyrósł godny kompan poznańskiego brata - ziemniaka. A jak już uzyskaliśmy dostęp do morza , mogliśmy śmiało wypłynąć na szerokie wody i bez obaw weszliśmy szturmem na poznańskie Jeżyce, gdzie w kameralnym lokalu zaczęliśmy odtwarzać wspomnienia serwując domowe placki ziemniaczane i pyry z bzikiem. W 2016 wodujemy flagowy okręt przy Skwerze Kościuszki w Gdyni i pełną pyrą ruszamy na bitwę wystawiając naszych najdzielniejszych pyratów ,więc jeśli kiedykolwiek słyszałeś i wziąłeś sobie do serca "zjedz mięso a zostaw ziemniaka " lepiej na nich uważaj i miej się na baczności. Od zawsze wkładamy w nasze działania całe serce i wiedzę, dlatego nasze ziemniaki są takie dobre, a mając zakorzenione nieustające parcie do doskonałości można się spodziewać, że w przyszłości będą tylko lepsze. Do zobaczenia w Pyra Bar -ACH',
            ]
        ];
        $restaurants = $this->makeRestaurants($restaurants_array);
        $this->persistAll($restaurants, $manager);
        $this->addReferenceToAll($restaurants);
        $manager->flush();
    }

    /**
     * @param $restaurants
     * @return array
     */
    public function makeRestaurants($restaurants)
    {
        $restaurant_objects = [];
        foreach ($restaurants as $key => $r) {
            $restaurant = new Restaurant();
            $restaurant->setName($r['name']);
            $restaurant->setImage(stream_get_contents(fopen(__DIR__ . '/restaurant_images/' . $r['image'], 'rb')));
            $restaurant->setShortDescription($r['short_description']);
            $restaurant->setDescription($r['description']);
            $restaurant_objects[$key] = $restaurant;
        }

        return $restaurant_objects;
    }

    /**
     * @param $restaurants
     * @param $manager
     */
    public function persistAll($restaurants, $manager)
    {
        foreach ($restaurants as $r) {
            $manager->persist($r);
        }
    }

    /**
     * @param $restaurants
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function addReferenceToAll($restaurants)
    {
        foreach ($restaurants as $key => $r) {
            $this->addReference($key, $r);
        }
    }
}