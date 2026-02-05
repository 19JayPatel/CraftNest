-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2025 at 07:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftnest`
--

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'jay', '$2y$10$NyvEOVMwRJ95ZXJcivY7nexBonNMTUTyPMsXjBszyGvxaf6Sjmqga');

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `fullname`, `email`, `mobile`, `address`, `total_amount`, `order_date`) VALUES
(1, 4, 'Zornyx', 'zornyx12@example.com', '9408156437', 'Rajkot', 1947.00, '2025-11-19 18:04:59'),
(2, 3, 'Parth Patel', 'parth23@12gmail.com', '9824816513', 'Pune', 498.00, '2025-11-19 18:09:02'),
(3, 2, 'John Doe', 'john@12gmail.com', '9724799111', 'Mumbai', 3597.00, '2025-11-19 18:18:41');

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 6, 1, 799.00),
(2, 1, 9, 1, 249.00),
(3, 1, 16, 1, 899.00),
(4, 2, 5, 1, 299.00),
(5, 2, 10, 1, 199.00),
(6, 3, 6, 2, 799.00),
(7, 3, 7, 1, 1999.00);

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `image`, `image2`, `image3`, `image4`) VALUES
(5, 'Handmade Kankavati', 299.00, 'A beautifully designed traditional kankavati used for pooja, gifting, and festive rituals. Its handcrafted details reflect our rich culture, making it a perfect piece for wedding, haldi, mehndi, and religious ceremonies.', 'stonkankavati.jpg', 'stonkankavati2.jpg', 'stonkankavati3.jpg', 'stonkankavati.jpg'),
(6, 'Decorative Bajot', 799.00, 'This decorative bajot features stunning handwork that elevates your pooja room or festive décor. Strong, beautifully finished, and culturally inspired, it adds a royal charm to rituals and celebrations.', 'DecorativeBajot.jpg', 'DecorativeBajot2.jpg', 'DecorativeBajot3.jpg', 'DecorativeBajot4.jpg'),
(7, 'Karwachauth Puja Set', 1999.00, 'A complete handcrafted puja set designed specially for Karwa Chauth rituals. Each item showcases traditional artistry, making the festival more auspicious, beautiful, and meaningful for every married woman.', 'KarwachauthPuja.jpg', 'KarwachauthPuja2.jpg', 'KarwachauthPuja3.jpg', 'KarwachauthPuja4.jpg'),
(8, 'Handicrafts Bullock Cart', 999.00, 'A unique miniature bullock cart crafted with exquisite precision, ideal for home décor or wedding decorations. Its detailed craftsmanship showcases rural Indian tradition, adding a rustic and artistic charm to any space.', 'HandicraftsBullockCart.jpg', 'HandicraftsBullockCart2.jpg', 'HandicraftsBullockCart3.jpg', 'HandicraftsBullockCart4.jpg'),
(9, 'Decorative Mukhwas Dani', 249.00, 'A beautifully handcrafted Decorative Mukhwas Dani adorned with colorful sparkling stones. Its vibrant design adds charm to any dining table while keeping your mukhwas fresh and presentable. Perfect for festive occasions, gatherings, and elegant home decor.', 'mukhwasdani.png', 'mukhwasdani2.png', 'mukhwasdani3.png', ''),
(10, 'Kalash For Puja & Wedding', 199.00, 'Mangal Kalash Use For Many Things like As Festive , Pooja, Wedding, Temple,Decoration, Griha Pravesh. In Indian Culture \"Samaiyu\" Is A Symbol Of Good Luck & Prosperity During The Indian Wedding, The Shreefal Lota SET Is Given By The Bride To The Groom Which Is Very Important In Any Indian Wedding These Set Is Covered With Kundan Peal & Stones Which Enhance The Beauty Of The Shreefal It Is A Perfect Gift For Wedding, House Warm Party, Anniversary, Festivals And Can Also Be Used For All Other Occassions Like Marriage And Engagement Ceremony.', 'Pooja_loti.jpg', 'Pooja_loti1.jpg', 'Pooja_loti2.jpg', 'Pooja_loti3.jpg'),
(11, 'Mangal Kalash', 499.00, 'A perfect pooja essential kalash lota with antique handmade stone and meenakari painting work. The product is made up of wood with stone decoration kalash along with a coconut (Nariyal) this beautiful piece of art will definitely add to your worshiping area. It also serves as a unique present for your loved ones. Each piece is hand crafted. This kalash with nariyal use in pooja, havan,temple and home temple with holy water (Gangajal),rice (Chawal),and prasadam this lucky and holy for temple,pooja,and present.', 'Mangal_Kalash.jpg', 'Mangal_Kalash1.jpg', 'Mangal_Kalash2.jpg', 'Mangal_Kalash3.jpg'),
(12, 'Decorative Big Kalash', 549.00, 'The Traditional Puja Kalash is a beautifully crafted and intricately designed is perfect for adding a touch of tradition and elegance to your home decor.', 'Big_Kalash.jpg', 'Big_Kalash1.jpg', '', ''),
(13, 'Purna Kumbha With Mirror', 549.00, 'Elevate your spiritual space and festive celebrations with handcrafted Mangal Kalash pots and matching Indhoni ring holders. These beautifully decorated items are central to Hindu rituals, symbolizing abundance, good luck, and divine blessings. Each piece is intricately adorned with mirror work, pearls, and vibrant green and red stones, making them perfect for traditional worship, major festivals like Diwali and Navratri, and essential wedding ceremonies. These items add a touch of ethnic elegance to any home, inviting positive energy and embodying the spirit of prosperity and balance.', 'PurnaKumbha.jpg', 'PurnaKumbha1.jpg', 'Purna-Kumbha2.jpg', 'PurnaKumbha3.jpg'),
(14, 'Pooja Lota', 299.00, 'Traditional Indian pot, known as a kalash or lota, which is commonly used in Hindu rituals for storing holy water or offerings. The pot is extensively decorated with beads, mirrors, and rhinestones in a vibrant pattern.', 'Pooja_lota.jpg', 'Pooja_lota2.jpg', '', ''),
(15, 'Decorative Steel Dabba', 399.00, 'Red decorative box, often referred to as a \"dibba\" or a decorative steel storage container. This handicraft item features an elegant \"Rajwadi\" design, typically used for wedding gifts, home decor, or religious (pooja) purposes.', 'steeldabba.jpg', 'steeldabba1.jpg', '', ''),
(16, 'Pooja Thali', 899.00, 'Handcrafted decorative pooja thali, which is a ceremonial plate used in Hindu worship.This elegant piece is ideal for festive occasions and religious ceremonies, adding a traditional and ornate touch to rituals.', 'The Pooja Thali.jpg', 'The Pooja Thali3.jpg', 'The Pooja Thali1.jpg', 'The Pooja Thali2.jpg');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(2, 'John Doe', 'john@12gmail.com', '$2y$10$eamvF6be18UN.NvPStzWJuAT0rDYq15F7XMvicuSINAJDcS9Q0QIC', '2025-11-19 16:51:31'),
(3, 'Parth', 'parth23@12gmail.com', '$2y$10$62h8O83TdWKUqhIwAKja7OJ15yMmsOF0Z6sQ1ZZwcRJEPfOzvCGY2', '2025-11-19 16:58:11'),
(4, 'zornyx12', 'zornyx12@example.com', '$2y$10$ar55opkWF12J/YYvk25ZP.G9Z2kgcdRK3dR/F9ReADXlaTLzDvUhy', '2025-11-19 17:35:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
