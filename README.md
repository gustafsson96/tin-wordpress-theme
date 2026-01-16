# Projekt - WordPress-tema för Tin Åling (Skapat av Julia Gustafsson)

För detta projekt har en webbplats skapats med ett nytt WordPress-tema för konstnären **Tin Åling**. Utvecklingsarbetet har utgått från designskisser som tagits fram tillsammans med konstnären som därefter implementerats i en statisk webbplats. Den statiska webbplatsen har sedan omvandlats till detta WordPress-tema (i en separat projektmapp), där majoriteten av allt innehåll renderas dynamiskt från wp-admin. 

Webbplatsen kan ses här: [Tin Åling – Konst](https://studenter.miun.se/~jugu2402/writeable/wordpress/)

## Teknologier
* HTML, CSS och JavaScript
* PHP
* WordPress CMS

## Struktur
Följande filer har skapats: 
* **header.php** - webbplatsens huvudmeny med dynamiskt renderade menyföremål. 
* **front-page.php** – template för startsidan med nyhetsartiklar och en separat sidobar.  
* **sidebar.php** – sidobaren som hämtas in på startsidan och presenterar slumpvalt utvalda konstverk.  
* **single.php** – strukturen för en enskild nyhetsartikel.  
* **art-page.php** – konstsidan med klickbara kategorier som konstnären skapar konst inom.  
* **taxonomy-konstkategorier.php** – en överblick av filtrerade konstverk för vald kategori.  
* **single-konstverk.php** – ett enskilt konstverk med titel, bild och beskrivning.  
* **about-page.php** – information om Tin Åling tillsammans med ett kontaktformulär. 
* **footer.php** - En simpel footer med copyright-ikon och aktuellt år. 

## Installerade plugins: 
* **Custom Post Type UI (CPT UI)** – För att skapa den anpassade taxonomin *konstkategori* med tillhörande inläggstyp för konstverk.  
* **Advanced Custom Fields (ACF)** – För att lägga till ett bildfält kopplat till konstkategorier.  
* **Contact Form 7** – För att skapa ett kontaktformulär.  
* **SSH SFTP Updater Support** – Nödvändigt för att kunna publicera den färdiga sidan till servern.  
* **Yoast SEO** – För sökoptimering av webbplatsens innehåll.  
* **Smart Slide 3** - För att skapa en slideshow på startsidan. 

## Publicering
Webbplatsen har publicerats till Mittuniversitetets student-server (https://studenter.miun.se/) med hjälp av FileZilla. 