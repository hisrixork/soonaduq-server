-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 24 juil. 2018 à 13:33
-- Version du serveur :  5.6.38
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+02:00";

--
-- Base de données :  `soonaduq`
--

-- --------------------------------------------------------

--
-- Structure de la table `surah`
--

DROP TABLE IF EXISTS `surah`;

CREATE TABLE IF NOT EXISTS `surah` (
  `id` varchar(100) DEFAULT NULL,
  `french` varchar(100) DEFAULT NULL,
  `arab` varchar(100) DEFAULT NULL,
  `phonetic` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `surah`
--

INSERT INTO `surah` (`id`, `french`, `arab`, `phonetic`) VALUES
('1', 'La Fatiha', 'الفاتحة', 'ʾAl-Fātiḥa'),
('2', 'La Vache', 'البقرة', 'ʾAl-Baqara'),
('3', 'La Famille de ʿImran', 'آل عمران', 'ʾĀl-ʿImrān'),
('4', 'Les Femmes', 'النساء', 'ʾAn-Nisāʾ'),
('5', 'La Table servie', 'المائدة', 'ʾAl-Māʾida'),
('6', 'Les Troupeaux', 'الأنعام', 'ʾAl-ʾAnʿām'),
('7', 'Al ʿAraf', 'الأعراف', 'ʾAl-ʾAʿrāf'),
('8', 'Le Butin', 'الأنفال', 'ʾAl-ʾAnfāl'),
('9', 'L\'Immunité', 'التوبة', 'ʾAt-Tawba'),
('10', 'Jonas', 'يونس', 'Yūnus'),
('11', 'Houd', 'هود', 'Hūd'),
('12', 'Joseph', 'يوسف', 'Yūsuf'),
('13', 'Le Tonnerre', 'الرعد', 'ʾAr-Raʿd'),
('14', 'Abraham', 'إبراهيم', 'ʾIbrāhīm'),
('15', 'Al Hijr', 'الحجر', 'ʾAl-Ḥiǧr'),
('16', 'Les Abeilles', 'النحل', 'ʾAn-Naḥl'),
('17', 'Le Voyage nocturne', 'الإسراء', 'ʾAl-ʾIsrāʾ'),
('18', 'La Caverne', 'الكهف', 'ʾAl-Kahf'),
('19', 'Marie', 'مريم', 'Mariyam'),
('20', 'Ta. Ha.', 'طه', 'Tā Hā'),
('21', 'Les Prophètes', 'الأنبياء', 'ʾAl-ʾAnbiyāʾ'),
('22', 'Le Pèlerinage', 'الحج', 'ʾAl-Ḥaǧǧ'),
('23', 'Les Croyants', 'المؤمنون', 'ʾAl-Muʾminūn'),
('24', 'La Lumière', 'النور', 'ʾAn-Nūr'),
('25', 'La Loi', 'الفرقان', 'ʾAl-Furqān'),
('26', 'Les Poètes', 'الشعراء', 'ʾAš-Šuʿarāʾ'),
('27', 'Les Fourmis', 'النمل', 'ʾAn-Naml'),
('28', 'Le Récit', 'القصص', 'ʾAl-Qaṣaṣ'),
('29', 'L\'Araignée', 'العنكبوت', 'ʾAl-ʿAnkabūt'),
('30', 'Les Romains', 'الروم', 'ʾAr-Rūm'),
('31', 'Luqman', 'لقمان', 'Lukmān'),
('32', 'La Prosternation', 'السجدة', 'ʾAs-Saǧda'),
('33', 'Les Factions', 'الأحزاب', 'ʾAl-ʾAḥzāb'),
('34', 'Les Sabaʾ', 'سبإ', 'Sabaʾ'),
('35', 'Le Créateur', 'فاطر', 'Fāṭir'),
('36', 'Ya . Sin . ', 'يس', 'Yā Sīn'),
('37', 'Ceux qui sont placés en rangs', 'الصافات', 'ʾAṣ-Ṣāffāt'),
('38', 'Çad', 'ص', 'Ṣād'),
('39', 'Les Groupes', 'الزمر', 'ʾAz-Zumar'),
('40', 'Celui qui pardonne', 'غافر', 'Ġāfir'),
('41', 'Les Versets clairement exposés', 'فصلت', 'Fuṣṣilat'),
('42', 'La Délibération', 'الشورى', 'ʾAš-Šūrā'),
('43', 'L\'Ornement', 'الزخرف', 'ʾAz-Zuẖruf'),
('44', 'La Fumée', 'الدخان', 'ʾAd-Duẖān'),
('45', 'Celle qui est agenouillée', 'الجاثية', 'ʾAl-Ğāṯiya'),
('46', 'Al ʾAhqaf', 'الأحقاف', 'ʾAl-ʾAḥqāf'),
('47', 'Muhammad', 'محمد', 'Muḥammad'),
('48', 'La Victoire', 'الفتح', 'ʾAl-Fatḥ'),
('49', 'Les Appartements privés', 'الحجرات', 'ʾAl-Ḥuǧurāt'),
('50', 'Qaf', 'ق', 'Qāf'),
('51', 'Ceux qui se déplacent rapidement', 'الذاريات', 'ʾAḏ-Ḏāriyāt'),
('52', 'Le Mont', 'الطور', 'ʾAṭ-Ṭūr'),
('53', 'L’Étoile', 'النجم', 'ʾAn-Naǧm'),
('54', 'La Lune', 'القمر', 'ʾAl-Qamar'),
('55', 'Le Miséricordieux', 'الرحمن', 'ʾAr-Raḥmān'),
('56', 'Celle qui est inéluctable', 'الواقعة', 'ʾAl-Wāqiʿa'),
('57', 'Le Fer', 'الحديد', 'ʾAl-Ḥadīd'),
('58', 'La Discussion', 'المجادلة', 'ʾAl-Muǧādala'),
('59', 'Le Rassemblement', 'الحشر', 'ʾAl-Ḥašr'),
('60', 'L’Épreuve', 'الممتحنة', 'ʾAl-Mumtaḥana'),
('61', 'Le Rang', 'الصف', 'ʾAṣ-Ṣaf'),
('62', 'Le Vendredi', 'الجمعة', 'ʾAl-Ğumuʿa'),
('63', 'Les Hypocrites', 'المنافقون', 'ʾAl-Munāfiqūn'),
('64', 'La Duperie réciproque', 'التغابن', 'ʾAt-Taġābun'),
('65', 'La Répudiation', 'الطلاق', 'ʾAṭ-Ṭalāq'),
('66', 'L\'Interdiction', 'التحريم', 'ʾAt-Taḥrīm'),
('67', 'La Royauté', 'الملك', 'ʾAl-Mulk'),
('68', 'Le Calame', 'القلم', 'ʾAl-Qalam'),
('69', 'Celle qui doit venir', 'الحاقة', 'ʾAl-Ḥāqqa'),
('70', 'Les Degrés', 'المعارج', 'ʾAl-Maʿāriǧ'),
('71', 'Noé', 'نوح', 'Nūḥ'),
('72', 'Les Djinns', 'الجن', 'ʾAl-Ğinn'),
('73', 'Celui qui s\'est enveloppé', 'المزمل', 'ʾAl-Muzzammil'),
('74', 'Celui qui est revêtu d\'un manteau', 'المدثر', 'ʾAl-Muddaṯṯir'),
('75', 'La Résurrection', 'القيامة', 'ʾAl-Qiyāma'),
('76', 'L\'Homme', 'الإنسان', 'ʾAl-ʾInsān'),
('77', 'Les Envoyés', 'المرسلات', 'ʾAl-Mursalāt'),
('78', 'L\'Annonce', 'النبإ', 'ʾAn-Nabaʾ'),
('79', 'Ceux qui arrachent', 'النازعات', 'ʾAn-Nāziʿāt'),
('80', 'Il s\'est renfrogné', 'عبس', 'ʿAbasa'),
('81', 'Le Décrochement', 'التكوير', 'ʾAt-Takwīr'),
('82', 'La Rupture du ciel', 'الإنفطار', 'ʾAl-ʾInfitār'),
('83', 'Les Fraudeurs', 'المطففين', 'ʾAl-Mutaffifīn'),
('84', 'La Déchirure', 'الانشقاق', 'ʾAl-ʾInšiqāq'),
('85', 'Les Constellations', 'البروج', 'ʾAl-Burūǧ'),
('86', 'L\'Astre nocturne', 'الطارق', 'ʾAṭ-Ṭāriq'),
('87', 'Le Très-Haut', 'الأعلى', 'ʾAl-ʾAʿlā'),
('88', 'Celle qui enveloppe', 'الغاشية', 'ʾAl-Ġāšiya'),
('89', 'L\'Aube', 'الفجر', 'ʾAl-Faǧr'),
('90', 'La Cité', 'البلد', 'ʾAl-Balad'),
('91', 'Le Soleil', 'الشمس', 'ʾAš-Šams'),
('92', 'La Nuit', 'الليل', 'ʾAl-Layal'),
('93', 'La Clarté du jour', 'الضحى', 'ʾAḍ-Ḍuḥā'),
('94', 'L\'Ouverture', 'الشرح', 'ʾAš-Šarḥ'),
('95', 'Le Figuier', 'التين', 'ʾAt-Tīn'),
('96', 'Le Caillot de sang', 'العلق', 'ʾAl-ʿAlaq'),
('97', 'Le Décret', 'القدر', 'ʾAl-Qadr'),
('98', 'La Preuve décisive', 'البينة', 'ʾAl-Bayyina'),
('99', 'Le Tremblement de terre', 'الزلزلة', 'ʾAz-Zalzala'),
('100', 'Les Coursiers rapides', 'العاديات', 'ʾAl-ʿĀdiyāt'),
('101', 'Celle qui fracasse', 'القارعة', 'ʾAl-Qāriʿa'),
('102', 'La Rivalité', 'التكاثر', 'ʾAt-Takāṯur'),
('103', 'L\'Instant', 'العصر', 'ʾAl-ʿAṣr'),
('104', 'Le Calomniateur', 'الهمزة', 'ʾAl-Humaza'),
('105', 'L’Éléphant', 'الفيل', 'ʾAl-Fīl'),
('106', 'Les Quraïch', 'قريش', 'Qurayš'),
('107', 'Le Nécessaire', 'الماعون', 'ʾAl-Māʿūn'),
('108', 'L\'Abondance', 'الكوثر', 'ʾAl-Kawṯar'),
('109', 'Les Incrédules', 'الكافرون', 'ʾAl-Kāfirūn'),
('110', 'Le Secours', 'النصر', 'ʾAn-Naṣr'),
('111', 'La Corde', 'المسد', 'ʾAl-Masad'),
('112', 'Le Culte pur', 'الإخلاص', 'ʾAl-ʾIẖlāṣ'),
('113', 'L\'Aurore', 'الفلق', 'ʾAl-Falaq'),
('114', 'Les Hommes', 'الناس', 'ʾAn-Nās');
