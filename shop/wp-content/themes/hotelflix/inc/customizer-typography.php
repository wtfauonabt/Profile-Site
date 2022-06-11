<?php
/**
 * Theme Customizer
 *
 * @package Hotelflix
 */

/**
 * Create an array of available fonts.
 * The list was generated via the Google Fonts API 2020-06-29.
 * This list may need to be manually updated as more fonts are added to Google Fonts.
 */
function hotelflix_fonts_list() {

	$hotelflix_fonts = array( 'ABeeZee', 'Abel', 'Abhaya Libre', 'Abril Fatface', 'Aclonica', 'Acme', 'Actor', 'Adamina', 'Advent Pro', 'Aguafina Script', 'Akronim', 'Aladin', 'Alata', 'Alatsi', 'Aldrich', 'Alef', 'Alegreya', 'Alegreya SC', 'Alegreya Sans', 'Alegreya Sans SC', 'Aleo', 'Alex Brush', 'Alfa Slab One', 'Alice', 'Alike', 'Alike Angular', 'Allan', 'Allerta', 'Allerta Stencil', 'Allura', 'Almarai', 'Almendra', 'Almendra Display', 'Almendra SC', 'Amarante', 'Amaranth', 'Amatic SC', 'Amethysta', 'Amiko', 'Amiri', 'Amita', 'Anaheim', 'Andada', 'Andika', 'Angkor', 'Annie Use Your Telescope', 'Anonymous Pro', 'Antic', 'Antic Didone', 'Antic Slab', 'Anton', 'Arapey', 'Arbutus', 'Arbutus Slab', 'Architects Daughter', 'Archivo', 'Archivo Black', 'Archivo Narrow', 'Aref Ruqaa', 'Arima Madurai', 'Arimo', 'Arizonia', 'Armata', 'Arsenal', 'Artifika', 'Arvo', 'Arya', 'Asap', 'Asap Condensed', 'Asar', 'Asset', 'Assistant', 'Astloch', 'Asul', 'Athiti', 'Atma', 'Atomic Age', 'Aubrey', 'Audiowide', 'Autour One', 'Average', 'Average Sans', 'Averia Gruesa Libre', 'Averia Libre', 'Averia Sans Libre', 'Averia Serif Libre', 'B612', 'B612 Mono', 'Bad Script', 'Bahiana', 'Bahianita', 'Bai Jamjuree', 'Baloo 2', 'Baloo Bhai 2', 'Baloo Bhaina 2', 'Baloo Chettan 2', 'Baloo Da 2', 'Baloo Paaji 2', 'Baloo Tamma 2', 'Baloo Tammudu 2', 'Baloo Thambi 2', 'Balsamiq Sans', 'Balthazar', 'Bangers', 'Barlow', 'Barlow Condensed', 'Barlow Semi Condensed', 'Barriecito', 'Barrio', 'Basic', 'Baskervville', 'Battambang', 'Baumans', 'Bayon', 'Be Vietnam', 'Bebas Neue', 'Belgrano', 'Bellefair', 'Belleza', 'Bellota', 'Bellota Text', 'BenchNine', 'Bentham', 'Berkshire Swash', 'Beth Ellen', 'Bevan', 'Big Shoulders Display', 'Big Shoulders Text', 'Bigelow Rules', 'Bigshot One', 'Bilbo', 'Bilbo Swash Caps', 'BioRhyme', 'BioRhyme Expanded', 'Biryani', 'Bitter', 'Black And White Picture', 'Black Han Sans', 'Black Ops One', 'Blinker', 'Bokor', 'Bonbon', 'Boogaloo', 'Bowlby One', 'Bowlby One SC', 'Brawler', 'Bree Serif', 'Bubblegum Sans', 'Bubbler One', 'Buda', 'Buenard', 'Bungee', 'Bungee Hairline', 'Bungee Inline', 'Bungee Outline', 'Bungee Shade', 'Butcherman', 'Butterfly Kids', 'Cabin', 'Cabin Condensed', 'Cabin Sketch', 'Caesar Dressing', 'Cagliostro', 'Cairo', 'Caladea', 'Calistoga', 'Calligraffitti', 'Cambay', 'Cambo', 'Candal', 'Cantarell', 'Cantata One', 'Cantora One', 'Capriola', 'Cardo', 'Carme', 'Carrois Gothic', 'Carrois Gothic SC', 'Carter One', 'Catamaran', 'Caudex', 'Caveat', 'Caveat Brush', 'Cedarville Cursive', 'Ceviche One', 'Chakra Petch', 'Changa', 'Changa One', 'Chango', 'Charm', 'Charmonman', 'Chathura', 'Chau Philomene One', 'Chela One', 'Chelsea Market', 'Chenla', 'Cherry Cream Soda', 'Cherry Swash', 'Chewy', 'Chicle', 'Chilanka', 'Chivo', 'Chonburi', 'Cinzel', 'Cinzel Decorative', 'Clicker Script', 'Coda', 'Coda Caption', 'Codystar', 'Coiny', 'Combo', 'Comfortaa', 'Comic Neue', 'Coming Soon', 'Concert One', 'Condiment', 'Content', 'Contrail One', 'Convergence', 'Cookie', 'Copse', 'Corben', 'Cormorant', 'Cormorant Garamond', 'Cormorant Infant', 'Cormorant SC', 'Cormorant Unicase', 'Cormorant Upright', 'Courgette', 'Courier Prime', 'Cousine', 'Coustard', 'Covered By Your Grace', 'Crafty Girls', 'Creepster', 'Crete Round', 'Crimson Pro', 'Crimson Text', 'Croissant One', 'Crushed', 'Cuprum', 'Cute Font', 'Cutive', 'Cutive Mono', 'DM Mono', 'DM Sans', 'DM Serif Display', 'DM Serif Text', 'Damion', 'Dancing Script', 'Dangrek', 'Darker Grotesque', 'David Libre', 'Dawning of a New Day', 'Days One', 'Dekko', 'Delius', 'Delius Swash Caps', 'Delius Unicase', 'Della Respira', 'Denk One', 'Devonshire', 'Dhurjati', 'Didact Gothic', 'Diplomata', 'Diplomata SC', 'Do Hyeon', 'Dokdo', 'Domine', 'Donegal One', 'Doppio One', 'Dorsa', 'Dosis', 'Dr Sugiyama', 'Duru Sans', 'Dynalight', 'EB Garamond', 'Eagle Lake', 'East Sea Dokdo', 'Eater', 'Economica', 'Eczar', 'El Messiri', 'Electrolize', 'Elsie', 'Elsie Swash Caps', 'Emblema One', 'Emilys Candy', 'Encode Sans', 'Encode Sans Condensed', 'Encode Sans Expanded', 'Encode Sans Semi Condensed', 'Encode Sans Semi Expanded', 'Engagement', 'Englebert', 'Enriqueta', 'Erica One', 'Esteban', 'Euphoria Script', 'Ewert', 'Exo', 'Exo 2', 'Expletus Sans', 'Fahkwang', 'Fanwood Text', 'Farro', 'Farsan', 'Fascinate', 'Fascinate Inline', 'Faster One', 'Fasthand', 'Fauna One', 'Faustina', 'Federant', 'Federo', 'Felipa', 'Fenix', 'Finger Paint', 'Fira Code', 'Fira Mono', 'Fira Sans', 'Fira Sans Condensed', 'Fira Sans Extra Condensed', 'Fjalla One', 'Fjord One', 'Flamenco', 'Flavors', 'Fondamento', 'Fontdiner Swanky', 'Forum', 'Francois One', 'Frank Ruhl Libre', 'Freckle Face', 'Fredericka the Great', 'Fredoka One', 'Freehand', 'Fresca', 'Frijole', 'Fruktur', 'Fugaz One', 'GFS Didot', 'GFS Neohellenic', 'Gabriela', 'Gaegu', 'Gafata', 'Galada', 'Galdeano', 'Galindo', 'Gamja Flower', 'Gayathri', 'Gelasio', 'Gentium Basic', 'Gentium Book Basic', 'Geo', 'Geostar', 'Geostar Fill', 'Germania One', 'Gidugu', 'Gilda Display', 'Girassol', 'Give You Glory', 'Glass Antiqua', 'Glegoo', 'Gloria Hallelujah', 'Goblin One', 'Gochi Hand', 'Gorditas', 'Gothic A1', 'Gotu', 'Goudy Bookletter 1911', 'Graduate', 'Grand Hotel', 'Gravitas One', 'Great Vibes', 'Grenze', 'Griffy', 'Gruppo', 'Gudea', 'Gugi', 'Gupter', 'Gurajada', 'Habibi', 'Halant', 'Hammersmith One', 'Hanalei', 'Hanalei Fill', 'Handlee', 'Hanuman', 'Happy Monkey', 'Harmattan', 'Headland One', 'Heebo', 'Henny Penny', 'Hepta Slab', 'Herr Von Muellerhoff', 'Hi Melody', 'Hind', 'Hind Guntur', 'Hind Madurai', 'Hind Siliguri', 'Hind Vadodara', 'Holtwood One SC', 'Homemade Apple', 'Homenaje', 'IBM Plex Mono', 'IBM Plex Sans', 'IBM Plex Sans Condensed', 'IBM Plex Serif', 'IM Fell DW Pica', 'IM Fell DW Pica SC', 'IM Fell Double Pica', 'IM Fell Double Pica SC', 'IM Fell English', 'IM Fell English SC', 'IM Fell French Canon', 'IM Fell French Canon SC', 'IM Fell Great Primer', 'IM Fell Great Primer SC', 'Ibarra Real Nova', 'Iceberg', 'Iceland', 'Imprima', 'Inconsolata', 'Inder', 'Indie Flower', 'Inika', 'Inknut Antiqua', 'Inria Sans', 'Inria Serif', 'Inter', 'Irish Grover', 'Istok Web', 'Italiana', 'Italianno', 'Itim', 'Jacques Francois', 'Jacques Francois Shadow', 'Jaldi', 'Jim Nightshade', 'Jockey One', 'Jolly Lodger', 'Jomhuria', 'Jomolhari', 'Josefin Sans', 'Josefin Slab', 'Jost', 'Joti One', 'Jua', 'Judson', 'Julee', 'Julius Sans One', 'Junge', 'Jura', 'Just Another Hand', 'Just Me Again Down Here', 'K2D', 'Kadwa', 'Kalam', 'Kameron', 'Kanit', 'Kantumruy', 'Karla', 'Karma', 'Katibeh', 'Kaushan Script', 'Kavivanar', 'Kavoon', 'Kdam Thmor', 'Keania One', 'Kelly Slab', 'Kenia', 'Khand', 'Khmer', 'Khula', 'Kirang Haerang', 'Kite One', 'Knewave', 'KoHo', 'Kodchasan', 'Kosugi', 'Kosugi Maru', 'Kotta One', 'Koulen', 'Kranky', 'Kreon', 'Kristi', 'Krona One', 'Krub', 'Kulim Park', 'Kumar One', 'Kumar One Outline', 'Kurale', 'La Belle Aurore', 'Lacquer', 'Laila', 'Lakki Reddy', 'Lalezar', 'Lancelot', 'Lateef', 'Lato', 'League Script', 'Leckerli One', 'Ledger', 'Lekton', 'Lemon', 'Lemonada', 'Lexend Deca', 'Lexend Exa', 'Lexend Giga', 'Lexend Mega', 'Lexend Peta', 'Lexend Tera', 'Lexend Zetta', 'Libre Barcode 128', 'Libre Barcode 128 Text', 'Libre Barcode 39', 'Libre Barcode 39 Extended', 'Libre Barcode 39 Extended Text', 'Libre Barcode 39 Text', 'Libre Baskerville', 'Libre Caslon Display', 'Libre Caslon Text', 'Libre Franklin', 'Life Savers', 'Lilita One', 'Lily Script One', 'Limelight', 'Linden Hill', 'Literata', 'Liu Jian Mao Cao', 'Livvic', 'Lobster', 'Lobster Two', 'Londrina Outline', 'Londrina Shadow', 'Londrina Sketch', 'Londrina Solid', 'Long Cang', 'Lora', 'Love Ya Like A Sister', 'Loved by the King', 'Lovers Quarrel', 'Luckiest Guy', 'Lusitana', 'Lustria', 'M PLUS 1p', 'M PLUS Rounded 1c', 'Ma Shan Zheng', 'Macondo', 'Macondo Swash Caps', 'Mada', 'Magra', 'Maiden Orange', 'Maitree', 'Major Mono Display', 'Mako', 'Mali', 'Mallanna', 'Mandali', 'Manjari', 'Manrope', 'Mansalva', 'Manuale', 'Marcellus', 'Marcellus SC', 'Marck Script', 'Margarine', 'Markazi Text', 'Marko One', 'Marmelad', 'Martel', 'Martel Sans', 'Marvel', 'Mate', 'Mate SC', 'Maven Pro', 'McLaren', 'Meddon', 'MedievalSharp', 'Medula One', 'Meera Inimai', 'Megrim', 'Meie Script', 'Merienda', 'Merienda One', 'Merriweather', 'Merriweather Sans', 'Metal', 'Metal Mania', 'Metamorphous', 'Metrophobic', 'Michroma', 'Milonga', 'Miltonian', 'Miltonian Tattoo', 'Mina', 'Miniver', 'Miriam Libre', 'Mirza', 'Miss Fajardose', 'Mitr', 'Modak', 'Modern Antiqua', 'Mogra', 'Molengo', 'Molle', 'Monda', 'Monofett', 'Monoton', 'Monsieur La Doulaise', 'Montaga', 'Montez', 'Montserrat', 'Montserrat Alternates', 'Montserrat Subrayada', 'Moul', 'Moulpali', 'Mountains of Christmas', 'Mouse Memoirs', 'Mr Bedfort', 'Mr Dafoe', 'Mr De Haviland', 'Mrs Saint Delafield', 'Mrs Sheppards', 'Mukta', 'Mukta Mahee', 'Mukta Malar', 'Mukta Vaani', 'Muli', 'MuseoModerno', 'Mystery Quest', 'NTR', 'Nanum Brush Script', 'Nanum Gothic', 'Nanum Gothic Coding', 'Nanum Myeongjo', 'Nanum Pen Script', 'Neucha', 'Neuton', 'New Rocker', 'News Cycle', 'Niconne', 'Niramit', 'Nixie One', 'Nobile', 'Nokora', 'Norican', 'Nosifer', 'Notable', 'Nothing You Could Do', 'Noticia Text', 'Noto Sans', 'Noto Sans HK', 'Noto Sans JP', 'Noto Sans KR', 'Noto Sans SC', 'Noto Sans TC', 'Noto Serif', 'Noto Serif JP', 'Noto Serif KR', 'Noto Serif SC', 'Noto Serif TC', 'Nova Cut', 'Nova Flat', 'Nova Mono', 'Nova Oval', 'Nova Round', 'Nova Script', 'Nova Slim', 'Nova Square', 'Numans', 'Nunito', 'Nunito Sans', 'Odibee Sans', 'Odor Mean Chey', 'Offside', 'Old Standard TT', 'Oldenburg', 'Oleo Script', 'Oleo Script Swash Caps', 'Open Sans', 'Open Sans Condensed', 'Oranienbaum', 'Orbitron', 'Oregano', 'Orienta', 'Original Surfer', 'Oswald', 'Over the Rainbow', 'Overlock', 'Overlock SC', 'Overpass', 'Overpass Mono', 'Ovo', 'Oxanium', 'Oxygen', 'Oxygen Mono', 'PT Mono', 'PT Sans', 'PT Sans Caption', 'PT Sans Narrow', 'PT Serif', 'PT Serif Caption', 'Pacifico', 'Padauk', 'Palanquin', 'Palanquin Dark', 'Pangolin', 'Paprika', 'Parisienne', 'Passero One', 'Passion One', 'Pathway Gothic One', 'Patrick Hand', 'Patrick Hand SC', 'Pattaya', 'Patua One', 'Pavanam', 'Paytone One', 'Peddana', 'Peralta', 'Permanent Marker', 'Petit Formal Script', 'Petrona', 'Philosopher', 'Piedra', 'Pinyon Script', 'Pirata One', 'Plaster', 'Play', 'Playball', 'Playfair Display', 'Playfair Display SC', 'Podkova', 'Poiret One', 'Poller One', 'Poly', 'Pompiere', 'Pontano Sans', 'Poor Story', 'Poppins', 'Port Lligat Sans', 'Port Lligat Slab', 'Pragati Narrow', 'Prata', 'Preahvihear', 'Press Start 2P', 'Pridi', 'Princess Sofia', 'Prociono', 'Prompt', 'Prosto One', 'Proza Libre', 'Public Sans', 'Puritan', 'Purple Purse', 'Quando', 'Quantico', 'Quattrocento', 'Quattrocento Sans', 'Questrial', 'Quicksand', 'Quintessential', 'Qwigley', 'Racing Sans One', 'Radley', 'Rajdhani', 'Rakkas', 'Raleway', 'Raleway Dots', 'Ramabhadra', 'Ramaraja', 'Rambla', 'Rammetto One', 'Ranchers', 'Rancho', 'Ranga', 'Rasa', 'Rationale', 'Ravi Prakash', 'Red Hat Display', 'Red Hat Text', 'Redressed', 'Reem Kufi', 'Reenie Beanie', 'Revalia', 'Rhodium Libre', 'Ribeye', 'Ribeye Marrow', 'Righteous', 'Risque', 'Roboto', 'Roboto Condensed', 'Roboto Mono', 'Roboto Slab', 'Rochester', 'Rock Salt', 'Rokkitt', 'Romanesco', 'Ropa Sans', 'Rosario', 'Rosarivo', 'Rouge Script', 'Rozha One', 'Rubik', 'Rubik Mono One', 'Ruda', 'Rufina', 'Ruge Boogie', 'Ruluko', 'Rum Raisin', 'Ruslan Display', 'Russo One', 'Ruthie', 'Rye', 'Sacramento', 'Sahitya', 'Sail', 'Saira', 'Saira Condensed', 'Saira Extra Condensed', 'Saira Semi Condensed', 'Saira Stencil One', 'Salsa', 'Sanchez', 'Sancreek', 'Sansita', 'Sarabun', 'Sarala', 'Sarina', 'Sarpanch', 'Satisfy', 'Sawarabi Gothic', 'Sawarabi Mincho', 'Scada', 'Scheherazade', 'Schoolbell', 'Scope One', 'Seaweed Script', 'Secular One', 'Sedgwick Ave', 'Sedgwick Ave Display', 'Sen', 'Sevillana', 'Seymour One', 'Shadows Into Light', 'Shadows Into Light Two', 'Shanti', 'Share', 'Share Tech', 'Share Tech Mono', 'Shojumaru', 'Short Stack', 'Shrikhand', 'Siemreap', 'Sigmar One', 'Signika', 'Signika Negative', 'Simonetta', 'Single Day', 'Sintony', 'Sirin Stencil', 'Six Caps', 'Skranji', 'Slabo 13px', 'Slabo 27px', 'Slackey', 'Smokum', 'Smythe', 'Sniglet', 'Snippet', 'Snowburst One', 'Sofadi One', 'Sofia', 'Solway', 'Song Myung', 'Sonsie One', 'Sorts Mill Goudy', 'Source Code Pro', 'Source Sans Pro', 'Source Serif Pro', 'Space Mono', 'Spartan', 'Special Elite', 'Spectral', 'Spectral SC', 'Spicy Rice', 'Spinnaker', 'Spirax', 'Squada One', 'Sree Krushnadevaraya', 'Sriracha', 'Srisakdi', 'Staatliches', 'Stalemate', 'Stalinist One', 'Stardos Stencil', 'Stint Ultra Condensed', 'Stint Ultra Expanded', 'Stoke', 'Strait', 'Stylish', 'Sue Ellen Francisco', 'Suez One', 'Sulphur Point', 'Sumana', 'Sunflower', 'Sunshiney', 'Supermercado One', 'Sura', 'Suranna', 'Suravaram', 'Suwannaphum', 'Swanky and Moo Moo', 'Syncopate', 'Tajawal', 'Tangerine', 'Taprom', 'Tauri', 'Taviraj', 'Teko', 'Telex', 'Tenali Ramakrishna', 'Tenor Sans', 'Text Me One', 'Thasadith', 'The Girl Next Door', 'Tienne', 'Tillana', 'Timmana', 'Tinos', 'Titan One', 'Titillium Web', 'Tomorrow', 'Trade Winds', 'Trirong', 'Trocchi', 'Trochut', 'Trykker', 'Tulpen One', 'Turret Road', 'Ubuntu', 'Ubuntu Condensed', 'Ubuntu Mono', 'Ultra', 'Uncial Antiqua', 'Underdog', 'Unica One', 'UnifrakturCook', 'UnifrakturMaguntia', 'Unkempt', 'Unlock', 'Unna', 'VT323', 'Vampiro One', 'Varela', 'Varela Round', 'Vast Shadow', 'Vesper Libre', 'Viaoda Libre', 'Vibes', 'Vibur', 'Vidaloka', 'Viga', 'Voces', 'Volkhov', 'Vollkorn', 'Vollkorn SC', 'Voltaire', 'Waiting for the Sunrise', 'Wallpoet', 'Walter Turncoat', 'Warnes', 'Wellfleet', 'Wendy One', 'Wire One', 'Work Sans', 'Yanone Kaffeesatz', 'Yantramanav', 'Yatra One', 'Yellowtail', 'Yeon Sung', 'Yeseva One', 'Yesteryear', 'Yrsa', 'ZCOOL KuaiLe', 'ZCOOL QingKe HuangYou', 'ZCOOL XiaoWei', 'Zeyada', 'Zhi Mang Xing', 'Zilla Slab', 'Zilla Slab Highlight' );

	$fonts = array();

	foreach ( $hotelflix_fonts as $font ) {
		$font_value = str_replace( '+', '-', $font );
		$fonts[$font_value] = $font;
	}

	return $fonts;
}

/**
 * Add typography options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hotelflix_customize_register_typography( $wp_customize ) {
	$wp_customize->add_panel(
		'typography_panel',
		array(
			'title'    => __( 'Typography', 'hotelflix' ),
			'priority' => 50,
		)
	);

	$wp_customize->add_section(
		'body_and_content',
		array(
			'title'    => __( 'Body & content', 'hotelflix' ),
			'panel'    => 'typography_panel',
			'priority' => 10,
		)
	);

	/* Font family */
	$wp_customize->add_setting(
		'body_font_family',
		array(
			'default'           => 'Poppins',
			'sanitize_callback' => 'hotelflix_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'body_font_family',
		array(
			'type'    => 'select',
			'section' => 'body_and_content',
			'label'   => __( 'Select a font family', 'hotelflix' ),
			'choices' => hotelflix_fonts_list(),
		)
	);

	/* Font size */
	$wp_customize->add_setting(
		'body_font_size',
		array(
			'default'           => '16',
			'sanitize_callback' => 'hotelflix_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'body_font_size',
		array(
			'type'        => 'number',
			'section'     => 'body_and_content',
			'label'       => __( 'Select a base font-size (px) for the body', 'hotelflix' ),
			'input_attrs' => array(
				'min'  => 14,
				'max'  => 24,
				'step' => 1,
			),
		)
	);

	/* Font weight */
	$wp_customize->add_setting(
		'body_font_weight',
		array(
			'default'           => '400',
			'sanitize_callback' => 'hotelflix_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'body_font_weight',
		array(
			'type'    => 'select',
			'section' => 'body_and_content',
			'label'   => __( 'Select a font weight', 'hotelflix' ),
			'choices' => array(
				'400' => __( '400 Normal', 'hotelflix' ),
				'700' => __( '700 Bold', 'hotelflix' ),
			),
		)
	);

	/* line height */
	$wp_customize->add_setting(
		'body_line_height',
		array(
			'default'           => '1.5',
			'sanitize_callback' => 'hotelflix_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'body_line_height',
		array(
			'type'    => 'select',
			'section' => 'body_and_content',
			'label'   => __( 'Select a default line-height for the body', 'hotelflix' ),
			'choices' => array(
				'1'   => __( '1', 'hotelflix' ),
				'1.5' => __( '1.5', 'hotelflix' ),
				'2'   => __( '2', 'hotelflix' ),
				'2.5' => __( '2.5', 'hotelflix' ),
				'3'   => __( '3', 'hotelflix' ),
				'3.5' => __( '3.5', 'hotelflix' ),
			),
		)
	);

	/**
	 * Headings
	 */
	for ( $i = 1; $i < 7; $i++ ) {

		$wp_customize->add_section(
			'heading_' . $i,
			array(
				'title'    => 'H' . $i . ' ' . __( 'Heading', 'hotelflix' ),
				'priority' => 80,
				'panel'    => 'typography_panel',
			)
		);

		$wp_customize->add_setting(
			'heading_ ' . $i . '_font_family',
			array(
				'default'           => 'Teko',
				'sanitize_callback' => 'hotelflix_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'heading_ ' . $i . '_font_family',
			array(
				'type'    => 'select',
				'section' => 'heading_' . $i,
				'label'   => __( 'Select a font family', 'hotelflix' ),
				'choices' => hotelflix_fonts_list(),
			)
		);

		/* Font size heading*/
		$wp_customize->add_setting(
			'heading_ ' . $i . '_font_size',
			array(
				'default'           => '',
				'sanitize_callback' => 'hotelflix_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'heading_ ' . $i . '_font_size',
			array(
				'type'        => 'number',
				'section'     => 'heading_' . $i,
				'label'       => 'H' . $i . ' ' . __( 'Font size', 'hotelflix' ),
				'description' => __( 'Select a font size for the heading (px).', 'hotelflix' ),
				'input_attrs' => array(
					'min'  => 20,
					'max'  => 94,
					'step' => 1,
				),
			)
		);

		/* Font weight headings */
		$wp_customize->add_setting(
			'heading_' . $i . '_font_weight',
			array(
				'default'           => '700',
				'sanitize_callback' => 'hotelflix_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'heading_' . $i . '_font_weight',
			array(
				'type'    => 'select',
				'section' => 'heading_' . $i,
				'label'   => 'H' . $i . ' ' . __( 'Select a font weight', 'hotelflix' ),
				'choices' => array(
					'400' => __( '400 Normal', 'hotelflix' ),
					'700' => __( '700 Bold', 'hotelflix' ),
				),
			)
		);

		/* text-transform for headings */
		$wp_customize->add_setting(
			'heading_' . $i . '_text_transform',
			array(
				'default'           => 'initial',
				'sanitize_callback' => 'hotelflix_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'heading_' . $i . '_text_transform',
			array(
				'type'        => 'select',
				'section'     => 'heading_' . $i,
				'label'       => 'H' . $i . ' ' . __( 'Capitalization', 'hotelflix' ),
				'description' => __( 'You can choose to show the text as all uppercase or capitilized.', 'hotelflix' ),
				'choices'     => array(
					'initial'    => __( 'Default', 'hotelflix' ),
					'uppercase'  => __( 'Uppercase', 'hotelflix' ),
					'capitalize' => __( 'Capitalized', 'hotelflix' ),
				),
			)
		);

		/* Line height for headings */
		$wp_customize->add_setting(
			'heading_' . $i . '_line_height',
			array(
				'default'           => '2',
				'sanitize_callback' => 'hotelflix_sanitize_select',
			)
		);

		$wp_customize->add_control(
			'heading_' . $i . '_line_height',
			array(
				'type'    => 'select',
				'section' => 'heading_' . $i,
				'label'   => 'H' . $i . ' ' . __( 'Line height', 'hotelflix' ),
				'choices' => array(
					'1'   => __( '1', 'hotelflix' ),
					'1.5' => __( '1.5', 'hotelflix' ),
					'2'   => __( '2', 'hotelflix' ),
					'2.5' => __( '2.5', 'hotelflix' ),
				),
			)
		);
	}

}

add_action( 'customize_register', 'hotelflix_customize_register_typography' );

/**
 * Add custom typography styles.
 */
function hotelflix_typography_css() {
	echo '<style id="hotelflix-typography-css">';

	// Body & Content.
	echo '.content-area, .site-footer {';
	if ( get_theme_mod( 'body_line_height', '1.5' ) !== '1.5' ) {
		echo 'line-height:' . esc_html( get_theme_mod( 'body_line_height', '1.5' ) ) . '; ';
	}

	if ( get_theme_mod( 'body_font_size', '16' ) !== '16' ) {
		echo 'font-size:' . esc_html( get_theme_mod( 'body_font_size', '16' ) ) . 'px; ';
	}

	if ( get_theme_mod( 'body_font_weight', '400' ) !== '400' ) {
		echo 'font-size:' . esc_html( get_theme_mod( 'body_font_weight', '400' ) ) . ';';
	}

	echo '}';

	if ( get_theme_mod( 'body_font_family', 'Poppins' ) !== 'Poppins' ) {
		echo 'body { font-family: ' . esc_html( get_theme_mod( 'body_font_family', 'Poppins' ) ) . ';}';
	}

	// Headings.
	for ( $i = 1; $i < 7; $i++ ) {

		echo 'h' . $i . '{ ';

		if ( get_theme_mod( 'heading_ ' . $i . '_font_family', 'Teko' ) !== 'Teko' ) {
			echo 'font-family:' . esc_html( get_theme_mod( 'heading_ ' . $i . '_font_family', 'Teko' ) ) . '!important; ';
		}
		if ( get_theme_mod( 'heading_' . $i . '_line_height', '2' ) !== '2' ) {
			echo 'line-height:' . esc_html( get_theme_mod( 'heading_' . $i . '_line_height', '2' ) ) . '!important; ';
		}
		if ( get_theme_mod( 'heading_' . $i . '_text_transform', 'initial' ) !== 'initial' ) {
			echo 'text-transform:' . esc_html( get_theme_mod( 'heading_' . $i . '_text_transform', 'initial' ) ) . '!important; ';
		}
		if ( get_theme_mod( 'heading_' . $i . '_font_weight', '700' ) !== '700' ) {
			echo 'font-weight:' . esc_html( get_theme_mod( 'heading_' . $i . '_font_weight', '700' ) ) . '!important; ';
		}
		if ( get_theme_mod( 'heading_ ' . $i . '_font_size' ) ) {
			echo 'font-size:' . esc_html( get_theme_mod( 'heading_ ' . $i . '_font_size' ) ) . 'px !important;';
		}

		echo '}';
	}

	echo '</style>';
}

add_action( 'wp_head', 'hotelflix_typography_css' );

/**
 * Enqueue the selected fonts.
 */
function hotelflix_custom_fonts() {

	$body_font = get_theme_mod( 'body_font_family', 'Poppins' );
	if ( ! empty( $body_font ) && $body_font !== 'Poppins' ) {
		$body_font = '//fonts.googleapis.com/css2?family=' . $body_font . ':wght@200;300;400;500;600;700&&	display=swap';
		wp_enqueue_style( 'hotelflix_body_font', $body_font, array(), null );
	}

	$heading_fonts = array();
	for ( $i = 1; $i < 7; $i++ ) {
		if ( get_theme_mod( 'heading_ ' . $i . '_font_family', 'Teko' ) !== 'Teko' ) {
			$heading_fonts[] = get_theme_mod( 'heading_ ' . $i . '_font_family' );
		}
	}

	$heading_fonts       = array_unique( $heading_fonts );
	$heading_fonts_final = '';

	foreach ( $heading_fonts as $fonts ) {
		$heading_fonts_final .= 'family=' . $fonts . ':wght@200;300;400;500;600;700&&' ;
	}

	if ( ! empty( $heading_fonts_final ) ) {
		wp_enqueue_style( 'hotelflix_heading_fonts', '//fonts.googleapis.com/css2?' . $heading_fonts_final . 'display=swap', array(), null );
	}
}

add_action( 'wp_enqueue_scripts', 'hotelflix_custom_fonts' );
