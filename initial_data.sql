INSERT INTO restaurants (name, image_url, short_description, description)
VALUES ('Tutti Santi', 'image1.b42db6a8.jpg', 'Jedyna w Polsce pizzeria pod patronatem Mistrza Włoch i vice-mistrza świata. Valeria Valle.',
       'Mistrzowski smak
Teraz pizza mistrza Włoch w Twoim mieście, a także wprost do Twojego domu.
Naszym partnerem jest Valerio Valle, mistrz Włoch w pizzy klasycznej, jeden z najbardziej utytułowanych włoskich pizzaiolo, wielokrotnie nagradzany w międzynarodowych konkursach.
Valerio Valle prowadzi regularne szkolenia w zakresie pizzy w Città Sant’ Angelo (PE). Aktualnie zajmuje wysoką pozycję w TOP 25 Włoskich Pizzaioli wg Roberto Piccinelli.');
INSERT INTO restaurants (name, image_url, short_description, description)
VALUES ('A nóż widelec', 'image2.37c6d7f2.jpg', 'Odwiedzając A nóż widelec, wkraczasz w wielowymiarowy świat smaków i aromatów kuchni wielkopolskiej jak również europejskiej.',
       'Tutaj tradycja spotyka się z nowoczesnością, prezentując innowacyjną wizję kulinarnego dziedzictwa regionu. Czeka tu na Ciebie karta autorskich dań skomponowanych z bogactwa składników sezonowych, którymi cieszyć się możesz w przytulnie zaaranżowanym wnętrzu.');
INSERT INTO restaurants (name, image_url, short_description, description)
VALUES ('Weranda Caffe', 'image3.68bdeed1.jpg', 'Ukryta w samym centrum, tuż przy Starym Rynku, jest idealnie przytulna i zachwyca swym urokiem.',
       'Jak jednym zdaniem można opisać wszystkie restauracje Weranda Family? To połączenie niespotykanej dziś autentyczności, gościnności, designu oraz smaku serwowanych potraw. Wpadając do nas nawet na chwilę, ma się poczucie bycia we właściwym miejscu.
Co nas wyróżnia? Wspólną cechą naszych lokali jest atmosfera – rodzinna, sielska, sprzyjająca spotkaniom. Budujemy ją nie tylko precyzyjnie dopracowanymi daniami i legendarnym, zmieniającym się wraz z porami roku wystrojem (połączeniem zieleni i ręcznie wykonanych ozdób), ale przede wszystkim ludźmi z prawdziwą pasją gotowania i tworzenia czegoś nowego.
Każda z naszych restauracji jest inna, jednak wspólnie tworzą spójny koncept WERANDA FAMILY.');
INSERT INTO restaurants (name, image_url, short_description, description)
VALUES ('Restauracja Papierówka', 'image4.be1a5d23.jpg', 'Jedyna w Polsce pizzeria pod patronatem Mistrza Włoch i vice-mistrza świata. Valeria Valle.',
       'Papierówka to zielona odskocznia w centrum miasta. U nas zjesz lekką kuchnię regionalną urozmaiconą sezonowo, odpoczniesz w cieniu parku Zakrzewskiego oraz uraczysz się soczystymi jabłkami. Jesteśmy rodziną i naszą pasją od wielu lat jest gotowanie dla innych, przygotowywane dania przyrządzamy z najlepszych produktów z lokalnych gospodarstw.
Starujemy już od 9.00 z pysznymi śniadaniami które dadzą wam energię na cały dzień, zapraszamy również na lunche i obiady.
Papierówka to nie tylko smakowite dania ale również świetny wystrój: prosty świeży i przyjazny, już od progu poczęstuj się jabłkiem i rozpocznij przygodę z papierówką.');

INSERT INTO comments (restaurant_id, author, content, rate, posting_date)
VALUES ((SELECT id from restaurants WHERE name='Tutti Santi'), 'Mikilll', 'Pyszna pizza, miła i sprawna obsługa, krótki czas oczekiwania na zamówienie :) Miejsce godne polecenia, duży plus za wegańską pizze :)',
        5, '2016-04-02 13:25:27');
INSERT INTO comments (restaurant_id, author, content, rate, posting_date)
VALUES ((SELECT id from restaurants WHERE name='Tutti Santi'), 'marta_k', 'Przemiła obsługa! Przepyszne jedzenie! Jestem zauroczona tym miejscem a odczucia Moje spowodowane są tym że tak dobra restauracja ( poziom wielkich miast) jest przyjazna nie tylko czlowiekowi ale również Zwierzętom!!!! Dziękujemy za wszystko i zapewniam że będziemy częstymi klientami ! Marta- mama Maks Olek i Kira - najlepszy pies na świecie',
        5, '2017-01-23 20:12:34');
INSERT INTO comments (restaurant_id, author, content, rate, posting_date)
VALUES ((SELECT id from restaurants WHERE name='Tutti Santi'), 'Wojtas123', 'Po półgodzinnym oczekiwaniu i obserwowaniu jak obsługiwani są klienci, którzy złożyli zamówienia znacznie później niż my, zdecydowałem się na zadanie pytania co z naszym zamówieniem. Okazało się, że kelnerka zapomniała, jak ona to określiła, nabić. Niby każdy może się pomylić, ale ja już podziękuję ...chociaż pizza owszem, dobra',
        1, '2017-06-01 17:56:12');