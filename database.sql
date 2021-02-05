-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 04 2021 г., 22:34
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `abcdostal_renn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Adset_Id`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Adset_Id`;
CREATE TABLE `Adset_Id` (
  `adset_id` text NOT NULL,
  `camp_id` text NOT NULL,
  `access_token` text NOT NULL,
  `name` text NOT NULL,
  `state` text NOT NULL,
  `impressions` text NOT NULL,
  `clicks` text NOT NULL,
  `results` text NOT NULL,
  `spend` text NOT NULL,
  `cpl` text NOT NULL,
  `ctr` text NOT NULL,
  `cpm` text NOT NULL,
  `cpc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Adset_Id`
--

INSERT INTO `Adset_Id` (`adset_id`, `camp_id`, `access_token`, `name`, `state`, `impressions`, `clicks`, `results`, `spend`, `cpl`, `ctr`, `cpm`, `cpc`) VALUES
('23846317077350321', '23846317077150321', 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845921723110108', '23845921723010108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922005100108', '23845922004930108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922050410108', '23845922050300108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая группа объявлений', 'PAUSED', '', '', '', '', '', '', '', ''),
('23845947201620268', '23845947201280268', 'EAABsbCS1iHgBAFgTjXSMt26Ff6pWy9NcnjsIJPZCpT95k8go7bYKHFbSFsJXMkUAvyV9T5HImDxcqD24jSZAMm7SAmCn4Kb0hZAdaZBtTWso4v07QyZAoXkmBn1hRxfHhKYNRUxw3LSzKqAEDZAYErQWiIkdNtiYHA28oU68y5RaTLDlPuVy6k9UES5GzZBfZBYZD', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922075770108', '23845922075680108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая группа объявлений', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049728040334', '23846049727990334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049697420334', '23846049697240334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049646300334', '23846049646270334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049795410334', '23846049795270334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049807500334', '23846049807190334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049889600334', '23846049889450334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '4123', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049879280334', '23846049879120334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '4123', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049871170334', '23846049871130334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '4123', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('23846049848030334', '23846049847890334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '123', 'CAMPAIGN_PAUSED', '', '', '', '', '', '', '', ''),
('', '23846057881960334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', '', '', '', '', '', '', '', '', ''),
('23846057999580334', '23846057999340334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846057886950334', '23846057881960334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846058194490334', '23846058194270334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846059044920334', '23846059044750334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая группа объявлений', 'PAUSED', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Ad_Id`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Ad_Id`;
CREATE TABLE `Ad_Id` (
  `ad_id` text NOT NULL,
  `adset_id` text NOT NULL,
  `access_token` text NOT NULL,
  `name` text NOT NULL,
  `creative` text NOT NULL,
  `state` text NOT NULL,
  `disable_reason` text NOT NULL,
  `impressions` text NOT NULL,
  `clicks` text NOT NULL,
  `results` text NOT NULL,
  `spend` text NOT NULL,
  `cpl` text NOT NULL,
  `ctr` text NOT NULL,
  `cpm` text NOT NULL,
  `cpc` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Ad_Id`
--

INSERT INTO `Ad_Id` (`ad_id`, `adset_id`, `access_token`, `name`, `creative`, `state`, `disable_reason`, `impressions`, `clicks`, `results`, `spend`, `cpl`, `ctr`, `cpm`, `cpc`, `link`) VALUES
('23846317078260321', '23846317077350321', 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQCky0w7FNnZAjGn&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121842608_485284385725468_8293446627736596767_n.jpg%3Fccb%3D2%26_nc_ohc%3DnflAy2XpytAAX8OXJBJ%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D408759517c8a446e136cf4d04cf04a4c%26oe%3D5FC9DC94&cfs=1&_nc_cb=1&_nc_hash=AQC0THzjA_N7rfQb', 'ACTIVE', '', '729', '16', '0', '2.95', '0', '2.194787', '4.046639', '0.184375', 'https://nickricotertue.tk/'),
('23845921724120108', '23845921723110108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQBzxI6dxYHrbouF&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121945523_2837358239700976_7298677183470199159_n.jpg%3Fccb%3D2%26_nc_ohc%3DcMg9CQerWSQAX-JJdE0%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D9be5d31a20b9cef02e4383ce44b9c207%26oe%3D5FCA9B03&cfs=1&_nc_cb=1&_nc_hash=AQCopQhcGhC1-EIu', '', '', '0', '', '0', '0', '0', '', '', '', 'https://quibeaurefbiosen.ga/'),
('23845922005670108', '23845922005100108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQB6H9CM2K04B_B_&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121836312_685892152049161_5008555608919002246_n.jpg%3Fccb%3D2%26_nc_ohc%3DQqdjwPO1IJEAX_hH0Tr%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3Dfe2a2ec86a3da606b96e0a1f72d0e556%26oe%3D5FCA9FAC&cfs=1&_nc_cb=1&_nc_hash=AQDGnSiYdSwEBuGo', '', '', '0', '', '0', '0', '0', '', '', '', 'https://oridratorpi.ml/'),
('23845922051280108', '23845922050410108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQBMzFiw_gkuVbg1&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frx5-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121927680_660045551308715_554513736965253047_n.jpg%3Fccb%3D2%26_nc_ohc%3DKiYjvbI8xisAX8DTDA6%26_nc_ht%3Dz-p3-scontent-frx5-1.xx%26oh%3D77623358e2ebc6b9ba7a34c1a9729f34%26oe%3D5FC93B74&cfs=1&_nc_cb=1&_nc_hash=AQDbdOYzJsM23Deb', '', '', '0', '', '0', '0', '0', '', '', '', 'https://phpclub.ru/'),
('23845947204160268', '23845947201620268', 'EAABsbCS1iHgBAFgTjXSMt26Ff6pWy9NcnjsIJPZCpT95k8go7bYKHFbSFsJXMkUAvyV9T5HImDxcqD24jSZAMm7SAmCn4Kb0hZAdaZBtTWso4v07QyZAoXkmBn1hRxfHhKYNRUxw3LSzKqAEDZAYErQWiIkdNtiYHA28oU68y5RaTLDlPuVy6k9UES5GzZBfZBYZD', 'Новое объявление', 'https://z-p3-external-hel3-1.xx.fbcdn.net/safe_image.php?d=AQBT4eeINk2s3jeC&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-hel3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121943110_398910391519376_5393403527673602050_n.jpg%3Fccb%3D2%26_nc_ohc%3DyWNdC9wARnYAX-08Mgh%26_nc_ht%3Dz-p3-scontent-hel3-1.xx%26oh%3D45ce8b1f65b4c9ce25f47f3a360311ff%26oe%3D5FC90DA0&cfs=1&_nc_cb=1&_nc_hash=AQDRMozZicD9k4te', 'DISAPPROVED', '', '0', '', '0', '0', '0', '', '', '', 'https://kakertersdotislo.tk/'),
('23845922076990108', '23845922075770108', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQCX3vxfMzRaHMoP&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121914621_705415343665557_8433408697278462472_n.jpg%3Fccb%3D2%26_nc_ohc%3DbHAfDVQnjC0AX8JwZzT%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3Ded1ddffa072581415a1046f4360f0a8b%26oe%3D5FCB21B1&cfs=1&_nc_cb=1&_nc_hash=AQDeWRlZBupIsT1f', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://phpclub.ru/1'),
('23846049698850334', '23846049697420334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQC3-azCk3MnEXxE&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft1.0-9%2F120649338_100575661825572_4224996558998706256_o.jpg%3Fccb%3D2%26_nc_ohc%3DsAo6Ch-ulhAAX_n5UKY%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D0d052feb53ee5143f38c924ad22f48c6%26oe%3D5FCF784B&cfs=1&_nc_cb=1&_nc_hash=AQCnj_Xqfo7Xn8NN', 'DISAPPROVED', '', '0', '', '0', '0', '0', '', '', '', 'https://bayprogansigvolo.tk/?sub1=re2&robot=4926342674074334'),
('23846049796040334', '23846049795410334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQDMEFy_0JxqBdYb&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121841210_884279892106690_7661884295481131429_n.jpg%3Fccb%3D2%26_nc_ohc%3DZ3RXvstp2fEAX-FNwfE%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D478d2df8cd8638e4304dde2e65015b93%26oe%3D5FCE1142&cfs=1&_nc_cb=1&_nc_hash=AQAagW-qDCzlE7E8', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://prelsettvirita.ml/?sub1=re3&robot=4926342674074334'),
('23846049810000334', '23846049807500334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQAO1n-vTgk0k_hK&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121846768_709725089655486_8197193991385701522_n.jpg%3Fccb%3D2%26_nc_ohc%3DFD7JDQDUC3QAX8Weczg%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D20b52078b0eb4cc12a608f104f5c0776%26oe%3D5FCFFE1F&cfs=1&_nc_cb=1&_nc_hash=AQDLAYNDeJuzS-fC', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://prelsettvirita.ml/?sub1=re3'),
('23846058000130334', '23846057999580334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQBzbLIdharGDtRg&w=64&h=64&url=https%3A%2F%2Fwww.facebook.com%2Fads%2Fimage%2F%3Fd%3DAQJD7KpLqVVXYu_c88FQ-uitNBvHwK3LWomef2sf152LuYRlyzZNgg4xxQtZpeeTJSXyakzxXyBtvhobpUV0D3SQim_JokQDUkncu3BTXuM9WTxmVOMOEwHOXf6d-4P4h2aTfUv7KrvQAYj_8wtDY-H4&cfs=1&_nc_cb=1&_nc_hash=AQCTTaExni6kBgRZ', 'PAUSED', '', '73', '', '0', '0.17', '0', '', '2.328767', '', 'https://www.flaticon.com/'),
('23846049890600334', '23846049889600334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQB5HCa28YO4IE2Z&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121936611_409964923348787_4719494635736563344_n.jpg%3Fccb%3D2%26_nc_ohc%3D8iTFgOclI3cAX-xcmpY%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3D05d163f8319d47b4748e84f1dd9960a6%26oe%3D5FCF4925&cfs=1&_nc_cb=1&_nc_hash=AQD8xqfvFQWLKF4i', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://yandex.ru/?sub1=ren3'),
('23846049880420334', '23846049879280334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQBipk4oEbLvJEQW&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121950565_425394605135308_346306596142691574_n.jpg%3Fccb%3D2%26_nc_ohc%3DiLmeOt4FYlcAX8ZgBne%26_nc_ht%3Dz-p3-scontent-frt3-1.xx%26oh%3De8eff1f3d054c27d45a0aa82f4525712%26oe%3D5FCFF01A&cfs=1&_nc_cb=1&_nc_hash=AQCWJAnfF-8ZR9OW', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://yandex.com/?sub1=ren3&robot=4926342674074334'),
('23846049872470334', '23846049871170334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQDiQQ9UOGY12-wH&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frt3-2.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121940220_2698796547052036_8308943259991540933_n.jpg%3Fccb%3D2%26_nc_ohc%3DDewgh8q4bokAX8Ik0fM%26_nc_ht%3Dz-p3-scontent-frt3-2.xx%26oh%3Df433fe858a8207285cb0615d2eb40e7a%26oe%3D5FCE630B&cfs=1&_nc_cb=1&_nc_hash=AQBdZLyeI30n5Mp-', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://prelsettvirita.ml/?sub1=ren3'),
('23846049848860334', '23846049848030334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '123', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQCwAR5QuDHC408_&w=64&h=64&url=https%3A%2F%2Fz-p3-scontent-frx5-1.xx.fbcdn.net%2Fv%2Ft15.5256-10%2F121841409_358487608713403_642712789265374244_n.jpg%3Fccb%3D2%26_nc_ohc%3DyBlaTkkEUy4AX_ro2sS%26_nc_ht%3Dz-p3-scontent-frx5-1.xx%26oh%3Dc7b398b4eb1d51f1b62fb37451fe1c3c%26oe%3D5FCDB8B7&cfs=1&_nc_cb=1&_nc_hash=AQAhUGihCBJDzoF4', 'PAUSED', '', '0', '', '0', '0', '0', '', '', '', 'https://prelsettvirita.ml/?sub1=ren3&robot=4926342674074334'),
('23846058194780334', '23846058194490334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQD_iEGKY152Ymq7&w=64&h=64&url=https%3A%2F%2Fwww.facebook.com%2Fads%2Fimage%2F%3Fd%3DAQIfxJI68RqVd3kMnyie1L2NH0gxb6YHXWX05rPItADSp7OKj--e6eGz_427UhYx72j8a0abCcdfVq_RG9wZGtTNCUcZoNI4RnBfzjl1jJhAMTedjTS6m7S6NfkEwIz5D2YipMgCjbgGur0RAg4jk2K_&cfs=1&_nc_cb=1&_nc_hash=AQDV8dww2iyjrnrc', 'PAUSED', '', '148', '1', '0', '0.18', '0', '0.675676', '1.216216', '0.18', 'https://habr.com/'),
('23846059045410334', '23846059044920334', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новое объявление', 'https://z-p3-external-frt3-2.xx.fbcdn.net/safe_image.php?d=AQAb6SGVVoPAmG69&w=64&h=64&url=https%3A%2F%2Fwww.facebook.com%2Fads%2Fimage%2F%3Fd%3DAQLY6oJrMt6xhBZdjEJ0trJP-H3FGH92Gf1MGoRH3xbgvOpvIyVZMcBY3otxPS5fol9sBGKMfyhkFuuRuD_-vnAYmJETiWgu6kmuMIr_qTTnk3999A85Ycuzl_yQ9V3zUUqJKCLZ5PWUaJRuGQdGvoLL&cfs=1&_nc_cb=1&_nc_hash=AQA_LGEUr5IErGuw', 'PENDING_REVIEW', '', '0', '', '0', '0', '0', '', '', '', 'https://habr.com/');

-- --------------------------------------------------------

--
-- Структура таблицы `Camp_Id`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Camp_Id`;
CREATE TABLE `Camp_Id` (
  `camp_id` text NOT NULL,
  `rk_id` text NOT NULL,
  `access_token` text NOT NULL,
  `name` text NOT NULL,
  `state` text NOT NULL,
  `impressions` text NOT NULL,
  `clicks` text NOT NULL,
  `results` text NOT NULL,
  `spend` text NOT NULL,
  `cpl` text NOT NULL,
  `ctr` text NOT NULL,
  `cpm` text NOT NULL,
  `cpc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Camp_Id`
--

INSERT INTO `Camp_Id` (`camp_id`, `rk_id`, `access_token`, `name`, `state`, `impressions`, `clicks`, `results`, `spend`, `cpl`, `ctr`, `cpm`, `cpc`) VALUES
('23846317077150321', 'act_869174410279929', 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845921723010108', 'act_3347792012006754', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922004930108', 'act_3347792012006754', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922050300108', 'act_3347792012006754', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23845947201280268', 'act_3293868250648669', 'EAABsbCS1iHgBAFgTjXSMt26Ff6pWy9NcnjsIJPZCpT95k8go7bYKHFbSFsJXMkUAvyV9T5HImDxcqD24jSZAMm7SAmCn4Kb0hZAdaZBtTWso4v07QyZAoXkmBn1hRxfHhKYNRUxw3LSzKqAEDZAYErQWiIkdNtiYHA28oU68y5RaTLDlPuVy6k9UES5GzZBfZBYZD', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23845922075680108', 'act_3347792012006754', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049727990334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049697240334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049646270334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049795270334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049807190334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049889450334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049879120334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049871130334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '1234', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846049847890334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '123', 'PAUSED', '', '', '', '', '', '', '', ''),
('23846057881960334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846057999340334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846058194270334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'ACTIVE', '', '', '', '', '', '', '', ''),
('23846059044750334', 'act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Новая кампания', 'PAUSED', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Fp_Id`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Fp_Id`;
CREATE TABLE `Fp_Id` (
  `fp_id` text NOT NULL,
  `access_token` text NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `fp_token` text NOT NULL,
  `is_published` text NOT NULL,
  `instagram_actor_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Fp_Id`
--

INSERT INTO `Fp_Id` (`fp_id`, `access_token`, `name`, `category`, `fp_token`, `is_published`, `instagram_actor_id`) VALUES
('118138173362512', 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', 'Rebimgano', 'Альбом', 'EAABsbCS1iHgBAP9oU0djNgVYwqjdV7sDdWDFcAUVzZBBB1JHqO2RVU402YqixZAUnX4bnBllMZChZBiaz52kVF7G34zz1nne4Tianl84VyZBdKXfZAJWmWw99cxpxz640ULtT3Qh2mFP6cALfVIZCxZC9B5JfVG1lfyoj8sBHYWnzZAZAkVQARCf3ZCkCZBOcHp0QnEZD', '1', '3071149929655864'),
('105237097992313', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Kazhapaov', 'Инструктор', 'EAABsbCS1iHgBAIazh3XKjBzEPDOGxl9uZAksQ47rym83TP0HovxcgnZCEOTzWJ00WMOBcMjaDWKGXS7PAVGJF7297WyKA7IUB0yODqOh3FHsqSrxWcrD0pxoEvgdeQ3UtCRfW5JDWhWKIros4Xc9ebwPqMiy0wZCFKDfkiYS6enQFt1qZBSp3Sq1ZCa8Fr2sZD', '1', '3814668258577412'),
('102271664960087', 'EAABsbCS1iHgBAFgTjXSMt26Ff6pWy9NcnjsIJPZCpT95k8go7bYKHFbSFsJXMkUAvyV9T5HImDxcqD24jSZAMm7SAmCn4Kb0hZAdaZBtTWso4v07QyZAoXkmBn1hRxfHhKYNRUxw3LSzKqAEDZAYErQWiIkdNtiYHA28oU68y5RaTLDlPuVy6k9UES5GzZBfZBYZD', 'Naasvaan', 'Профессиональная спортивная команда', 'EAABsbCS1iHgBAD6gdnj5W7wTiICYjNxtnHLqpaZAX7mqFaaZAEsvImxxhAcTnQbBhTZCZATWzF7iAmAdpgvjeUk5EdsGBrJc3tZCszcnKymo5ZB2OXD6EDUBwMP3jCQ5gDEZB4ZC9v6wE8tmDulGx1BEV83XNC67zLHZBPUsxi2Eb3Ph2EWjJpjis1nyJlczvr5UZD', '1', '5187944604552913'),
('100574031825735', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Giboelt', 'Предприниматель', 'EAABsbCS1iHgBAOdMKoyV6Fe4nj5C5FgyLlZAmlsaiZAhY35q2OHUqbxTjMS1DXXoZAwvn3mPZC3SwM6iOMYcsGZBE3ewEJu8uam1LMWcG2T0ZBBxZAA9yJ52r5y9x0fMlnhbZBGL33qZCfZBPSDFDwUJbZA3tVz585QiOUICrtjbkpLCgjZBYxpU9IZC5sizNnRH5tLIZD', '1', '3707148912649293');

-- --------------------------------------------------------

--
-- Структура таблицы `Rk_Id`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Rk_Id`;
CREATE TABLE `Rk_Id` (
  `rk_id` text NOT NULL,
  `access_token` text NOT NULL,
  `name` text NOT NULL,
  `pixel_id` text NOT NULL,
  `card` text NOT NULL,
  `currency` text NOT NULL,
  `adtrust_dsl` text NOT NULL,
  `threshold_amount` text NOT NULL,
  `state` text NOT NULL,
  `disable_reason` text NOT NULL,
  `impressions` text NOT NULL,
  `clicks` text NOT NULL,
  `results` text NOT NULL,
  `spend` text NOT NULL,
  `cpl` text NOT NULL,
  `ctr` text NOT NULL,
  `cpm` text NOT NULL,
  `cpc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Rk_Id`
--

INSERT INTO `Rk_Id` (`rk_id`, `access_token`, `name`, `pixel_id`, `card`, `currency`, `adtrust_dsl`, `threshold_amount`, `state`, `disable_reason`, `impressions`, `clicks`, `results`, `spend`, `cpl`, `ctr`, `cpm`, `cpc`) VALUES
('act_983701935386641', 'EAABsbCS1iHgBAHhTfqShnZBZAwAMEw1RcGiVBPPG8KZBrceh8dPpHelUixrIEeKm4LuxyZBjgYLHmNZAc2to9VUv9IxGkiHW6Qx04L9M6FZBq0oX0ElyeqxoSivtEjIAgIhZCWbhIWS52KwG4RgR0AEQAoPlaALZAQl4NJ2S94qcFeEC9TSukczaHMbjzs0akkAZD', 'Екатерина Ключникова', '', '', 'USD', '25', '0', 'ACTIVE', 'NONE', '', '', '', '', '', '', '', ''),
('act_869174410279929', 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', 'Анна Монахова', '3052115455074616', '', 'USD', '50', '2', 'ERROR', 'NONE', '', '', '', '', '', '', '', ''),
('act_3347792012006754', 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', 'Клара Иванова', '372265784089074', 'MasterCard*9941', 'USD', '50', '', 'ERROR', 'ADS_INTEGRITY_POLICY', '', '', '', '', '', '', '', ''),
('act_3293868250648669', 'EAABsbCS1iHgBAFgTjXSMt26Ff6pWy9NcnjsIJPZCpT95k8go7bYKHFbSFsJXMkUAvyV9T5HImDxcqD24jSZAMm7SAmCn4Kb0hZAdaZBtTWso4v07QyZAoXkmBn1hRxfHhKYNRUxw3LSzKqAEDZAYErQWiIkdNtiYHA28oU68y5RaTLDlPuVy6k9UES5GzZBfZBYZD', 'Яночка Зубарева', '398369948178086', 'MasterCard*2880', 'USD', '50', '10', 'DISABLED', 'ADS_INTEGRITY_POLICY', '', '', '', '', '', '', '', ''),
('act_397511951256717', 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', 'Рената Бочарова', '4926342674074334', 'Visa*7720', 'USD', '50', '2', 'ERROR', 'NONE', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `Tokenbase`
--
-- Создание: Фев 04 2021 г., 19:12
-- Последнее обновление: Фев 04 2021 г., 19:12
--

DROP TABLE IF EXISTS `Tokenbase`;
CREATE TABLE `Tokenbase` (
  `number` int(255) NOT NULL,
  `access_token` text NOT NULL,
  `acc_id` text NOT NULL,
  `name` text NOT NULL,
  `proxy` text NOT NULL,
  `state` text NOT NULL,
  `user_agent` text NOT NULL,
  `groups` text NOT NULL,
  `comment` text NOT NULL,
  `fp` text NOT NULL,
  `policy` text NOT NULL,
  `reftime` text NOT NULL,
  `acc_name` text NOT NULL,
  `cookie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Tokenbase`
--

INSERT INTO `Tokenbase` (`number`, `access_token`, `acc_id`, `name`, `proxy`, `state`, `user_agent`, `groups`, `comment`, `fp`, `policy`, `reftime`, `acc_name`, `cookie`) VALUES
(917, 'EAABsbCS1iHgBADgApZCeoVy4lrEOaoobvf7nNmespq96VzqZCFP1pPFffaWDdbmQnFvaZC6jav5QCV4aP6HwWizL00bEqzJ6ZAjyMeGFCjpEvD5nUZClmuJcZAOtRDOe0Ebiez3cHMPUnIMRbIyJkFB0YWtH2pz0ArPdm72PUUZCrPlgyxYfrTO', '100054422643103', 'Анна Монахова', 'http://185.154.75.130:8054@killbill:kuzul515', 'Check Passwd', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/84.0.4147.56 Safari/537.36', 'Нет', '', '+', '', '1604996941', '208', ''),
(921, 'EAABsbCS1iHgBAOd7L3VeYOXlTnxmUiqdoPJuQHoWVZBqriIgTjp6KC4LMCvuda5JM0DOtL3zw4ctjAd0t9ywUvZA6om9PdsvfIR2HiTDEeWtFBo85ffRAgHD9ILYY2DtD4rtgCidJHCdwe4JPJ4mGSYyoVArd1EZAVBd7H51c6eXZCBgiwo5', '100054224771344', 'Клара Иванова', 'http://185.154.75.130:8054@killbill:kuzul515', 'Check Passwd', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/82.0.4067.0 Safari/537.36', 'Нет', '', '+', '', '1605104433', '211', ''),
(927, 'EAABsbCS1iHgBAGBoZBEwboY5FTXA6wterJXXPfiGgHzFOQZAX4OLZB5T7NPr6YL3WDlUoqowYNNwJlYaAKe3vkhJvCczAudyZBlR3exym5wBQconeapHiMu1Ubsis00lZByZBEkvhXC5GXtJ7NVNoPkhWj552u2kd0cdXnizrTSBF1GO4uVZAZCH', '100054579397928', 'Рената Бочарова', 'http://185.154.75.130:8054@killbill:kuzul515', 'Selfy', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.79 Safari/537.36', 'Нет', '', '+', '+', '1604998050', '420', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Adset_Id`
--
ALTER TABLE `Adset_Id`
  ADD UNIQUE KEY `UNIQUE` (`adset_id`(255));

--
-- Индексы таблицы `Ad_Id`
--
ALTER TABLE `Ad_Id`
  ADD UNIQUE KEY `UNIQUE` (`ad_id`(255));

--
-- Индексы таблицы `Camp_Id`
--
ALTER TABLE `Camp_Id`
  ADD UNIQUE KEY `camp_id` (`camp_id`(255));

--
-- Индексы таблицы `Fp_Id`
--
ALTER TABLE `Fp_Id`
  ADD UNIQUE KEY `fp_id` (`fp_id`(255));

--
-- Индексы таблицы `Rk_Id`
--
ALTER TABLE `Rk_Id`
  ADD UNIQUE KEY `rk_id` (`rk_id`(255));

--
-- Индексы таблицы `Tokenbase`
--
ALTER TABLE `Tokenbase`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `number` (`number`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Tokenbase`
--
ALTER TABLE `Tokenbase`
  MODIFY `number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=975;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
