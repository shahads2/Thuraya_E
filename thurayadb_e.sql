-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2026 at 05:31 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thurayadb_e`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `national_id` varchar(20) DEFAULT NULL,
  `trip_name` varchar(150) DEFAULT NULL,
  `trip_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'confirmed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `national_id`, `trip_name`, `trip_date`, `price`, `image_url`, `booking_date`, `status`) VALUES
(35, '1357913579', 'Red Sea Diving', '2026-03-12', 540.00, 'https://book.txsaudi.com//Images2/eXchange/d97db27b-f833-4094-97bb-895e0fcec9ea.jpg', '2026-03-09 19:10:21', 'confirmed'),
(36, '1131469445', 'Aseer Historical, Castles & Museums', '2026-03-12', 3500.00, 'https://book.txsaudi.com//Images2/eXchange/d5cb9dc9-ae41-4a4b-a0a9-72f7a9a69d2e.jpg', '2026-03-09 20:46:19', 'cancelled'),
(37, '1131469445', 'Diriyah Heritage Experience', '2026-03-13', 450.00, 'https://book.txsaudi.com//Images2/eXchange/f7eac63a-7ed9-4b73-8869-889ab58290a0.jpg', '2026-03-10 06:24:36', 'confirmed'),
(38, '1131469445', 'Aseer Historical, Castles & Museums', '2026-05-01', 3500.00, 'https://book.txsaudi.com//Images2/eXchange/d5cb9dc9-ae41-4a4b-a0a9-72f7a9a69d2e.jpg', '2026-04-16 22:40:26', 'cancelled'),
(39, '1131469445', 'Red Sea Diving', '2026-05-01', 540.00, 'https://book.txsaudi.com//Images2/eXchange/d97db27b-f833-4094-97bb-895e0fcec9ea.jpg', '2026-04-16 22:41:17', 'cancelled'),
(40, '1131469445', 'Skyline Helicopter Tour', '2026-04-25', 1200.00, 'https://flyflapper.com/_next/image?url=https%3A%2F%2Fdlwwkvaei5hfp.cloudfront.net%2Faircrafts%2Fmodels%2F1764953634881987_image.jpg.webp&w=750&q=75', '2026-04-16 23:20:22', 'confirmed'),
(41, '1122334455', 'Old Town Artisan Trail', '2026-04-21', 280.00, 'https://www.visitsaudi.com/content/dam/wvs/destinations/alula/alula-old-town.JPG', '2026-04-17 21:27:41', 'confirmed'),
(42, '1131469445', 'AlUla Historical Trip', '2026-04-28', 2500.00, 'https://book.txsaudi.com//Images2/eXchange/b70942f7-ec9c-4dd7-b76d-8bd703b89590.jpg', '2026-04-24 23:45:31', 'cancelled'),
(43, '1131469445', 'Diriyah Night Heritage Tour', '2026-04-28', 420.00, 'https://book.txsaudi.com//Images2/eXchange/db872c24-1fe3-4c85-bb21-49c00d160a4f.jpg', '2026-04-24 23:55:08', 'cancelled'),
(44, '1131469445', 'Skyline Helicopter Tour', '2026-05-01', 1200.00, 'https://flyflapper.com/_next/image?url=https%3A%2F%2Fdlwwkvaei5hfp.cloudfront.net%2Faircrafts%2Fmodels%2F1764953634881987_image.jpg.webp&w=750&q=75', '2026-04-24 23:57:56', 'confirmed'),
(45, '1131469445', 'Red Sea Diving', '2026-04-28', 540.00, 'https://book.txsaudi.com//Images2/eXchange/d97db27b-f833-4094-97bb-895e0fcec9ea.jpg', '2026-04-25 00:25:26', 'cancelled'),
(46, '1131469445', 'Abha Mountain Escape', '2026-04-28', 3400.00, 'https://book.txsaudi.com//Images2/eXchange/41691e28-ea84-4e4b-8f7b-bd234830c66c.jpg', '2026-04-25 00:37:03', 'confirmed'),
(47, '1131469445', 'Al-Soudah Peaks Glamping', '2026-05-14', 1800.00, 'https://images.unsplash.com/photo-1510312305653-8ed496efae75?q=80&w=800', '2026-05-02 14:47:47', 'cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `badge_class` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `info` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `category`, `city`, `badge_class`, `image_url`, `info`, `description`, `price`) VALUES
(1, 'AlUla Historical Trip', 'historical', 'alula', 'badge-historical', 'https://book.txsaudi.com//Images2/eXchange/b70942f7-ec9c-4dd7-b76d-8bd703b89590.jpg', 'Half-day · Nature · Animal interactions', 'Explore Hegra, the Elephant Rock, and stay in luxurious desert camps under the stars.', 2500.00),
(2, 'Abha Mountain Escape', 'mountain', 'abha', 'badge-mountain', 'https://book.txsaudi.com//Images2/eXchange/41691e28-ea84-4e4b-8f7b-bd234830c66c.jpg', 'Full-day · Culture & History · Nature', 'Cool breeze and green mountains. Enjoy the cable car rides and Al-Soudah heights.', 3400.00),
(3, 'Red Sea Diving', 'sea', 'jeddah', 'badge-sea', 'https://book.txsaudi.com//Images2/eXchange/d97db27b-f833-4094-97bb-895e0fcec9ea.jpg', 'Half-day · Nature · Physical activities', 'A deep dive into the Red Sea. Enjoy snorkeling, boat trips, and the historic Al-Balad area.', 540.00),
(4, 'Diriyah Heritage Experience', 'historical', 'diriyah', 'badge-historical', 'https://book.txsaudi.com//Images2/eXchange/f7eac63a-7ed9-4b73-8869-889ab58290a0.jpg', 'Half-day · Culture & History · Walking Tour', 'Explore the historic At-Turaif district, traditional Najdi architecture and authentic Saudi cuisine.', 450.00),
(5, 'Aseer Historical, Castles & Museums', 'historical', 'abha', 'badge-historical', 'https://book.txsaudi.com//Images2/eXchange/d5cb9dc9-ae41-4a4b-a0a9-72f7a9a69d2e.jpg', 'Full-day · Meal included · Family friendly', 'Cultural journey through Aseer\'s heritage-rich landscapes. Tour of Abha\'s most iconic palaces and museums.', 3500.00),
(6, 'Riyadh Desert VIP Drift Adventure', 'adventure', 'riyadh', 'badge-adventure', 'https://book.txsaudi.com//Images2/eXchange/de551635-8cc7-4d41-a819-4f419cdbeb7c.jpg', 'Half-day · Adventure · Off-road Driving', 'Experience the thrill of dune bashing in a modified Jeep Wrangler through Riyadh\'s golden sands.', 2300.00),
(7, 'Luxury AlUla Retreat', 'luxury', 'alula', 'badge-luxury', 'https://book.txsaudi.com//Images2/eXchange/972ba9fc-0e9b-4124-9ac9-5d085d0e72cb.jpg', '3 Days · Luxury Hotel · Guided Tours', 'Stay in a luxury desert resort. Enjoy guided tours through AlUla mountains and stargazing nights.', 5200.00),
(8, 'Historic Jeddah Walking Tour', 'historical', 'jeddah', 'badge-historical', 'https://book.txsaudi.com//Images2/eXchange/3a1f8a16-c630-4d7e-936d-c6d1f295ea3e.jpg', 'Half-day · Culture · Walking Tour', 'Walk through the UNESCO heritage district of Al-Balad, explore ancient houses and traditional markets.', 1320.00),
(9, 'Red Sea Yacht Escape', 'luxury', 'jeddah', 'badge-sea', 'https://book.txsaudi.com//Images2/eXchange/f7830275-bcf2-4d24-8b57-2f2f2919a91a.jpg', '3 Days · Luxury Yacht · Sea Activities', 'A three-day luxury yacht journey. Swim in crystal waters and snorkel coral reefs.', 6900.00),
(10, 'Riyadh City Explorer', 'historical', 'riyadh', 'badge-city', 'https://book.txsaudi.com//Images2/eXchange/47e2de53-da18-4552-b8e3-ee2f10ab4b43.jpg', 'Full-day · Culture · City Tour', 'Discover Riyadh\'s iconic landmarks including museums, historic souqs and modern attractions.', 520.00),
(11, 'Al Baha Mountain Adventure', 'mountain', 'albaha', 'badge-mountain', 'https://book.txsaudi.com//Images2/eXchange/272e3310-51c8-44f0-b8b6-caa1d7fe2ba2.jpg', '2 Days · Nature · Hiking', 'Two days exploring Al Baha mountains, hiking scenic trails, and visiting waterfalls.', 1200.00),
(12, 'VIP Riyadh City Explorer', 'historical', 'riyadh', 'badge-city', 'https://book.txsaudi.com//Images2/eXchange/39b6928d-e4f6-4909-9090-7ac5ace0f988.jpeg', '4 Days · Culture · City Tour', 'A journey from Heritage to Modern Living with accommodation, transportation and guided tours.', 8200.00),
(13, 'Diriyah Night Heritage Tour', 'historical', 'diriyah', 'badge-historical', 'https://book.txsaudi.com//Images2/eXchange/db872c24-1fe3-4c85-bb21-49c00d160a4f.jpg', 'Half-day · Culture · Night Experience', 'Experience Diriyah at night with guided walks through At-Turaif district and authentic Saudi dining.', 420.00),
(14, 'Riyadh Desert Camping', 'adventure', 'riyadh', 'badge-adventure', 'https://book.txsaudi.com//Images2/eXchange/dc3d3c1d-2579-4919-8c3b-3e49114758ab.jpg', '2 Days · 1 Night · Desert Experience', 'Escape the city and enjoy a traditional Saudi desert camping trip under a blanket of stars.', 2100.00),
(15, 'Al Baha Forest Adventure', 'mountain', 'albaha', 'badge-mountain', 'https://book.txsaudi.com//Images2/eXchange/8f9b4961-6f73-420e-a59f-8e32f65f249e.jpg', 'Full-day · Nature · Hiking', 'Discover lush forests, scenic mountain views and peaceful nature trails in Al Baha.', 780.00),
(16, 'Skyline Helicopter Tour', 'adventure', 'riyadh', 'badge-adventure', 'https://flyflapper.com/_next/image?url=https%3A%2F%2Fdlwwkvaei5hfp.cloudfront.net%2Faircrafts%2Fmodels%2F1764953634881987_image.jpg.webp&w=750&q=75', '60 Minutes · Luxury Experience', 'Enjoy a breathtaking aerial view of Riyadh\'s Kingdom Centre and Al Faisaliyah Tower.', 1200.00),
(17, 'Edge of the World Trek', 'adventure', 'riyadh', 'badge-adventure', 'https://cdn.getyourguide.com/image/format=auto,fit=crop,gravity=auto,quality=60,width=1920,dpr=1/tour_img/ac1af00863b06e2e0326de2a8bb08767794487e0eb1fe31e2317d1be71a3328c.jpeg', 'Full-day · Nature · Hiking', 'A thrilling trip to the stunning cliffs of Jebel Fihrayn with sunset views and dinner.', 450.00),
(18, 'Obhur Yacht experince', 'sea', 'jeddah', 'badge-sea', 'https://laravel.ootlah.com/wp-content/uploads/2025/10/%D8%AE%D9%8A.jpg', 'Half-day · Luxury · Sea', 'Cruise through Obhur on a private yacht with music, catering, and water sports.', 3200.00),
(19, 'Tayebat Museum Cultural Tour', 'historical', 'jeddah', 'badge-historical', 'https://res.cloudinary.com/ddjuftfy2/image/upload/f_webp,c_fill,q_auto/memphis/large/660258683_Al-Tayebat-International-City-Highlights.webp', 'Half-day · Culture · Heritage', 'Explore the massive multi-room museum showcasing Islamic art and Saudi history.', 150.00),
(20, 'Maraya Concert Experience', 'luxury', 'alula', 'badge-luxury', 'https://scth.scene7.com/is/image/scth/Maraya-two:crop-760x570?defaultImage=Maraya-two', 'Night · Arts · Architecture', 'Visit the world\'s largest mirrored building with a premium dinner at Jason Atherton.', 950.00),
(21, 'Old Town Artisan Trail', 'historical', 'alula', 'badge-historical', 'https://www.visitsaudi.com/content/dam/wvs/destinations/alula/alula-old-town.JPG', 'Full-day · Shopping · Heritage', 'Walk through the ancient mud-brick city and meet local craftsmen and farmers.', 280.00),
(22, 'Al-Soudah Peaks Glamping', 'mountain', 'abha', 'badge-mountain', 'https://images.unsplash.com/photo-1510312305653-8ed496efae75?q=80&w=800', '2 Days · Luxury Camping', 'Stay in a high-end tent among the juniper trees in the highest peak of Saudi Arabia.', 1800.00),
(23, 'Honey Festival Tour', 'mountain', 'abha', 'badge-mountain', 'https://dunesanddates.com/wp-content/uploads/2024/07/HandH-gallery-4-1.png', 'Half-day · Food · Local', 'Taste the world-famous Sidr honey and visit traditional beehives in the mountains.', 200.00),
(24, 'The Marble Village Tour', 'historical', 'albaha', 'badge-historical', 'https://www.arabnews.com/sites/default/files/styles/n_670_395/public/main-image/2018/10/26/1350586-947018035.jpg?itok=LYoULjnh', 'Full-day · Heritage · Hiking', 'Discover the 400-year-old Dhee Ayn village, built on a white marble mountain.', 350.00),
(25, 'Raghadan Forest Zipline', 'adventure', 'albaha', 'badge-adventure', 'https://scth.scene7.com/is/image/scth/zip-line-six:crop-760x570?defaultImage=zip-line-six', 'Half-day · Adventure · Nature', 'Fly over the foggy forests of Al Baha on the longest zipline in the region.', 180.00),
(26, 'Bujairi Terrace Dining', 'luxury', 'diriyah', 'badge-luxury', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/2b/47/34/2a/as-you-savor-a-delicious.jpg?w=900&h=500&s=1', 'Night · Fine Dining · Culture', 'A premium culinary journey at international Michelin-starred restaurants.', 1200.00),
(27, 'Najdi Farm Experience', 'historical', 'diriyah', 'badge-historical', 'https://waditrip.sa/wp-content/uploads/2018/10/%D8%B3%D9%8A%D8%A8%D8%B3%D9%8A%D9%84.jpg', 'Full-day · Nature · Food', 'Enjoy a traditional lunch on a private farm with palm tree climbing shows.', 550.00),
(28, 'Riyadh Boulevard World VIP', 'adventure', 'riyadh', 'badge-city', 'https://portalcdn.spa.gov.sa/backend/original/202501/fQtwpPxKT7LRvPkeYkGw3cpEPJ7jikehiFigXhkb.jpg', 'Full-day · Fun · Global', 'Access all international zones with a VIP pass and fast-track entry.', 800.00),
(29, 'Jeddah Waterfront Bike Tour', 'adventure', 'jeddah', 'badge-sea', 'https://cdn.arabsstock.com/uploads/images/58318/a-saudi-arabian-gulf-woman-thumbnail-58318.webp', '2 Hours · Physical · Nature', 'Guided sunset bike tour along the world\'s longest seaside Corniche.', 120.00),
(30, 'AlUla Stargazing Dinner', 'luxury', 'alula', 'badge-luxury', 'https://www.ootlah.com/api/proxy-image?path=wp-content%2Fuploads%2F2024%2F10%2FStargazing-Tour-at-AlUla-City-in-Saudi-Arabia-5.png', 'Night · Romantic · Nature', 'A private gourmet dinner in the Gharameel desert surrounded by stars.', 1500.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `national_id` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `national_id`, `birthdate`, `nationality`, `mobile`, `email`, `password`, `semester`, `feedback`) VALUES
('Jana', 'alajaji', '1122334455', '2005-09-06', 'Saudi Arabia', '0503322101', 'Jana1alajaji@gmail.com', 'Jana12', 7, 'Is the best application with a strong meaning and a clear purpose 👍🏻🤍'),
('shahad', 'Alotaibi', '1131469445', '2005-11-12', 'Saudi Arabia', '0504927650', 'Shahad@gmail.com', 'Shahad1', 8, 'great'),
('Shatha ', 'alsahli', '1133552244', '2005-01-01', 'Saudi Arabia', '0551116740', 'Shatha@gmail.com', 'Shatha1', 7, 'I didn’t expect Saudi Arabia to have such amazing places. Thank you for this beautiful website.🤝🏻'),
('Nada', 'Alotaibi', '1143675557', '1995-03-08', 'Saudi Arabia', '0507634456', 'Srtghhg@hotmail.com', 'Nada12', 0, 'Amazing experience! The app is simple, useful, and built with a clear vision. Definitely deserves more attention 👍🏻🤍\n'),
('Jana', 'Alajaji', '1357913579', '2005-09-06', 'Saudi Arabia', '0509106514', 'Jana@gmail.com', '123456A', 0, 'I LOVE IT ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `national_id` (`national_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`national_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`national_id`) REFERENCES `users` (`national_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
