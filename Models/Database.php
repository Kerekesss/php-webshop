<?php

class Database {

    private const DB_HOST = "localhost";
    private const DB_USER = "root";
    private const DB_PASSWORD = "";
    private const DB_NAME = "website";
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect(self::DB_HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME);
    }

    
    private function createTables() {
        $this->conn->query("

        CREATE TABLE IF NOT EXISTS korisnici (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        ime varchar(128),
        email varchar(64) UNIQUE,
        sifra varchar(128),
        datum_rodjenja DATE
        )

        ");

        $this->conn->query("
        
        CREATE TABLE IF NOT EXISTS narudzbine (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        ime varchar(64),
        id_proizvoda int(11),
        id_korisnika int(11),
        kolicina int(11),
        cena decimal(10,2),
        dan_nabavke DATE
        )

        ");

        $this->conn->query("
        
        CREATE TABLE IF NOT EXISTS proizvodi (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        ime varchar(64) UNIQUE,
        opis text,
        cena decimal(10,2),
        slika text,
        kolicina int(11)
        )

        ");

        $this->conn->query("
        
        CREATE TABLE IF NOT EXISTS korpa (
        id int(11) AUTO_INCREMENT PRIMARY KEY,
        ime varchar(64),
        id_proizvoda int(11),
        id_korisnika int(11),
        kolicina int(11),
        cena decimal(10,2)
        )

        ");
    }

    private function importData() {
        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S24', 
        'Samsung Galaxy S24 Specifications
        Design and Build
        The Samsung Galaxy S24 features a premium design with an aluminum frame and Gorilla Glass Victus 3 for enhanced durability. Its lightweight build and IP68 water and dust resistance make it both stylish and sturdy. Choose from a range of elegant color options to match your style.
        <br><br>
        Display
        Enjoy stunning visuals on the 6.2-inch Dynamic AMOLED 2X display with FHD+ resolution (2340 x 1080 pixels) and a smooth 120Hz refresh rate. With a peak brightness of 1,600 nits and HDR10+ support, the screen delivers vibrant colors, deep contrasts, and sharp details, perfect for streaming, gaming, or browsing.
        <br><br>
        Performance
        Powered by the Exynos 2400 or Snapdragon 8 Gen 3 (region-dependent), the Galaxy S24 offers blazing-fast performance and energy efficiency. With up to 12GB RAM and One UI 6 on Android 14, it ensures seamless multitasking and an intuitive user experience.
        <br><br>
        Camera
        The triple-camera system includes a 50MP wide lens, 12MP ultra-wide lens, and a 10MP telephoto lens with 3x optical zoom. Capture crisp, detailed photos and videos, even in low light, with advanced stabilization and AI features.
        <br><br>
        Battery and Charging
        A 4,000mAh battery with 25W fast charging and wireless charging support ensures all-day power and convenience.
        ', 
        '1299.99', 
        'samsungs24.jpg',
        '52'
        )
        ");
        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S23', 
        'Samsung Galaxy S23 Specifications<br><br>
        Design and Build
        The Samsung Galaxy S24 features a premium design with an aluminum frame and Gorilla Glass Victus 3 for enhanced durability. Its lightweight build and IP68 water and dust resistance make it both stylish and sturdy. Choose from a range of elegant color options to match your style.
        <br><br>
        Display
        Enjoy stunning visuals on the 6.2-inch Dynamic AMOLED 2X display with FHD+ resolution (2340 x 1080 pixels) and a smooth 120Hz refresh rate. With a peak brightness of 1,600 nits and HDR10+ support, the screen delivers vibrant colors, deep contrasts, and sharp details, perfect for streaming, gaming, or browsing.
        <br><br>
        Performance
        Powered by the Exynos 2400 or Snapdragon 8 Gen 3 (region-dependent), the Galaxy S24 offers blazing-fast performance and energy efficiency. With up to 12GB RAM and One UI 6 on Android 14, it ensures seamless multitasking and an intuitive user experience.
        <br><br>
        Camera
        The triple-camera system includes a 50MP wide lens, 12MP ultra-wide lens, and a 10MP telephoto lens with 3x optical zoom. Capture crisp, detailed photos and videos, even in low light, with advanced stabilization and AI features.
        <br><br>
        Battery and Charging
        A 4,000mAh battery with 25W fast charging and wireless charging support ensures all-day power and convenience.', 
        '1099.99', 
        'samsungs23.jpg',
        '25'
        )
        ");
        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Iphone 15', 
        'The Best iphone there is', 
        '1299.99', 
        'iphone15.jpg',
        '33'
        )
        ");
        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Huawei Pura 70', 
        'The pinnacle of Huawei', 
        '1299.99', 
        'huaweipura70.jpg',
        '12'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S22', 
        'Samsung Galaxy S22 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy S22 features a sleek aluminum frame with Gorilla Glass Victus+ on both front and back. It offers IP68 water and dust resistance for added durability.<br><br>
        Display<br>
        A compact 6.1-inch Dynamic AMOLED 2X display with FHD+ resolution, HDR10+ support, and a 120Hz refresh rate ensures stunning visuals and smooth scrolling.<br><br>
        Performance<br>
        Powered by the Exynos 2200 or Snapdragon 8 Gen 1 (region-dependent), it provides excellent performance and efficient multitasking.<br><br>
        Camera<br>
        A triple-camera system with a 50MP main lens, 12MP ultra-wide, and 10MP telephoto lens with 3x optical zoom captures sharp photos and videos.<br><br>
        Battery and Charging<br>
        A 3,700mAh battery with 25W fast charging and 15W wireless charging keeps you powered throughout the day. Here opis ends.', 
        '329.99', 
        'samsungs22.jpg',
        '33'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S21', 
        'Samsung Galaxy S21 Specifications<br><br>
        Design and Build<br>
        With a lightweight design and an aluminum frame, the Samsung Galaxy S21 offers Gorilla Glass Victus protection and IP68 water resistance.<br><br>
        Display<br>
        Enjoy a 6.2-inch Dynamic AMOLED 2X display with FHD+ resolution, HDR10+ support, and a smooth 120Hz refresh rate for vibrant visuals.<br><br>
        Performance<br>
        Powered by the Exynos 2100 or Snapdragon 888 chipset, it delivers reliable performance for gaming, streaming, and multitasking.<br><br>
        Camera<br>
        The triple-camera system includes a 64MP telephoto lens, 12MP wide, and 12MP ultra-wide lenses for versatile photography.<br><br>
        Battery and Charging<br>
        A 4,000mAh battery with 25W fast charging and wireless charging support keeps you connected. Here opis ends.
        ', 
        '299.99', 
        'samsungs21.jpg',
        '27'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S20', 
        'Samsung Galaxy S20 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy S20 combines a sleek design with durable Gorilla Glass 6 and an aluminum frame. It is IP68 rated for water and dust resistance.<br><br>
        Display<br>
        Its 6.2-inch Dynamic AMOLED 2X display with QHD+ resolution and a 120Hz refresh rate delivers smooth and detailed visuals.<br><br>
        Performance<br>
        Equipped with the Exynos 990 or Snapdragon 865 processor, the S20 ensures excellent performance and energy efficiency.<br><br>
        Camera<br>
        A triple-camera setup with a 12MP wide, 64MP telephoto, and 12MP ultra-wide lens captures stunning photos and 8K video.<br><br>
        Battery and Charging<br>
        A 4,000mAh battery supports 25W fast charging and 15W wireless charging. Here opis ends.
        ', 
        '229.99', 
        'samsungs20.jpg',
        '15'
        )
        ");






        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S10', 
        'Samsung Galaxy S10 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy S10 offers a slim, lightweight design with Gorilla Glass 5 and an aluminum frame, providing a premium feel and IP68 water resistance.<br><br>
        Display<br>
        A 6.1-inch Dynamic AMOLED display with QHD+ resolution and HDR10+ ensures vibrant colors and sharp details.<br><br>
        Performance<br>
        Powered by the Exynos 9820 or Snapdragon 855 chipset, it delivers reliable performance and efficient multitasking.<br><br>
        Camera<br>
        A triple-camera system with a 12MP main, 12MP telephoto, and 16MP ultra-wide lens captures versatile and detailed photos.<br><br>
        Battery and Charging<br>
        A 3,400mAh battery with 15W fast charging and wireless charging support ensures all-day use. Here opis ends.
        ', 
        '200.99', 
        'samsungs10.jpg',
        '15'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S9', 
        'Samsung Galaxy S9 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy S9 features a compact design with Gorilla Glass 5 and an aluminum frame. Its IP68 water resistance adds reliability.<br><br>
        Display<br>
        A 5.8-inch Super AMOLED display with QHD+ resolution and HDR10 support offers vivid visuals and deep contrasts.<br><br>
        Performance<br>
        Equipped with the Exynos 9810 or Snapdragon 845, it delivers smooth performance for everyday tasks.<br><br>
        Camera<br>
        A single 12MP camera with variable aperture (f/1.5–f/2.4) ensures excellent low-light photography and super slow-motion video recording.<br><br>
        Battery and Charging<br>
        A 3,000mAh battery supports 15W fast charging and wireless charging. Here opis ends.
        ', 
        '189.99', 
        'samsungs9.jpg',
        '15'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung Galaxy S8', 
        'Samsung Galaxy S8 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy S8 offers a sleek glass design with Gorilla Glass 5 and an aluminum frame, complemented by IP68 water resistance.<br><br>
        Display<br>
        A 5.8-inch Super AMOLED Infinity Display with QHD+ resolution ensures vibrant visuals and immersive viewing.<br><br>
        Performance<br>
        Powered by the Exynos 8895 or Snapdragon 835 chipset, the S8 delivers reliable performance and smooth multitasking.<br><br>
        Camera<br>
        A single 12MP rear camera with dual-pixel autofocus and f/1.7 aperture captures sharp, clear images in all lighting conditions.<br><br>
        Battery and Charging<br>
        A 3,000mAh battery supports 15W fast charging and wireless charging. Here opis ends.
        ', 
        '150.69', 
        'samsungs8.jpg',
        '15'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung A55', 
        'Samsung Galaxy A55 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy A55 features a modern design with a plastic back and aluminum frame for durability. It offers water resistance for everyday use.<br><br>
        Display<br>
        A 6.4-inch Super AMOLED display with FHD+ resolution provides sharp visuals and vivid colors for an enjoyable viewing experience.<br><br>
        Performance<br>
        Powered by the Exynos 1280 chipset, it ensures smooth performance for everyday tasks and gaming.<br><br>
        Camera<br>
        A quad-camera system with a 64MP main lens, 12MP ultra-wide, 5MP macro, and 5MP depth sensor delivers versatile photography options.<br><br>
        Battery and Charging<br>
        A 5,000mAh battery supports 25W fast charging for extended usage. Here opis ends.
        ', 
        '399.99', 
        'samsunga55.jpg',
        '25'
        )
        ");

        $this->conn->query("
        INSERT INTO proizvodi 
        (ime, opis, cena, slika, kolicina) 
        VALUES 
        (
        'Samsung A73', 
        'Samsung Galaxy A73 Specifications<br><br>
        Design and Build<br>
        The Samsung Galaxy A73 combines a sleek plastic frame with Gorilla Glass for durability. It is designed to resist minor splashes and dust.<br><br>
        Display<br>
        A 6.7-inch Super AMOLED+ display with FHD+ resolution and a 120Hz refresh rate ensures smooth visuals and vibrant colors.<br><br>
        Performance<br>
        Powered by the Snapdragon 778G chipset, the A73 delivers reliable performance for multitasking and gaming.<br><br>
        Camera<br>
        A quad-camera setup with a 108MP main lens, 12MP ultra-wide, 5MP macro, and 5MP depth sensor captures detailed and dynamic photos.<br><br>
        Battery and Charging<br>
        A 5,000mAh battery with 25W fast charging provides extended battery life. Here opis ends.
        ', 
        '441.99', 
        'samsunga73.jpg',
        '35'
        )
        ");
    }
}