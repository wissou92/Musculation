drop database if exists Programmes_Sportifs ; 

create database Programmes_Sportifs;
use Programmes_Sportifs ;

# a faire en php probleme pour import le fichier dans la base de donnee
/*CREATE USER 'gerant'@'localhost' IDENTIFIED BY 'wissam_moussa';
CREATE USER 'adherant'@'localhost' IDENTIFIED BY 'utilisateur';


# a faire en php probleme pour import le fichier dans la base de donnee
GRANT ALL PRIVILEGES ON Programmes_Sportifs.* TO 'wissmouss'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON Programmes_Sportifs.Adherant TO 'adherant'@'localhost';*/

drop table if exists Pratique , Coaching_sportif, Coaching_nutrition, Coach , Adherant , Exercice , Conseil_dietetique, Programme ;
drop view if exists Imc, nb_coaching_s, nb_coaching_n, classement_coach;


create table Coach (
	numero			int(2)			not null 	auto_increment,
	nom 			varchar(30)		not null, 
	prenom 			varchar(30) 	not null, 
	experience 		varchar(30) 	not null, 
	note  			int(2)					,

	primary key (numero)
);



create table Adherant (
	nom 			varchar(30) 	not null, 
	prenom 			varchar(30) 	not null, 
	email 			varchar(56) 	not null, 
	mdp 			varchar(100) 	not null,
	poids 			int(3) 			not null,
	age 			int(3) 			not null,
	taille 			int(3) 			not null,
	
	primary key (email)
); 



create table Programme (

	id  				int(3) 			not null	auto_increment,
	nom 				varchar(30) 	not null, 
	categorie_programme enum
							('musculation'
							,'remise_en_forme'
							,'relaxation'
							,'cardio')	not null, 

	prix 				int(3) 			not null, 
	description 		varchar(200) 	not null,
	difficulte  		int(3) 			not null, 
	avis 				int(2)					,
	
	primary key (id)
);

create table Exercice (

	id_programme 		int(3) 			not null, 
	id_exercice         int(3)          not null	auto_increment,
	nom_exercice 		varchar(30) 	not null, 
	categorie_exercice  enum
							('musculation'
							,'remise_en_forme'
							,'relaxation'
							,'cardio')	not null,
	description 		varchar(300) 	not null, 
	prix_exercice 		int(3) 			not null,
	
	primary key (id_exercice),
	foreign key (id_programme) references Programme (id)
); 



create table Conseil_dietetique (

	id_programme		int(3) 			not null, 
	id_conseil			int(3)			not null	auto_increment,
	nom_conseil   		varchar(30) 	not null, 
	categorie_conseil 	enum
							('musculation'
							,'remise_en_forme'
							,'relaxation'
							,'cardio')	not null,
	description 		varchar(200) 	not null, 
	prix_conseil  		int (3) 		not null,
	
	primary key (id_conseil),
	foreign key (id_programme) references Programme (id)
);

create table Pratique (
	date_debut 		date 			not null, 
	date_fin   		date 			not null, 
	avis 			int(2)					,
	email_adherent 	varchar(54) 	not null, 
	id_programme 	int(3) 			not null, 
	
	primary key (email_adherent, id_programme),
	foreign key (email_adherent) references Adherant (email),
	foreign key (id_programme)	 references Programme (id)
);



create table Coaching_sportif (
	date_coaching  	date 			not null, 
	avis 			int(2),
	numero_coach	int(2)          not null,
	email_adherent 	varchar(54) 	not null,
	code_exercice 	int(3) 			not null,
	

	primary key (numero_coach, email_adherent,code_exercice),
	foreign key (numero_coach) 		references Coach(numero),
	foreign key (email_adherent) 	references Adherant (email),
	foreign key (code_exercice) 	references Exercice(id_exercice)
);


create table Coaching_nutrition (
	date_coaching 	date 			not null, 
	avis 			int (2),
	numero_coach    int (2)         not null,
	email_adherent 	varchar(54) 	not null, 
	nom_conseil 	varchar(30) 	not null,
	code_conseil    int (3)         not null, 
	
	primary key (numero_coach, email_adherent, nom_conseil),
	foreign key (numero_coach) 		references Coach (numero),
	foreign key (email_adherent) 	references Adherant (email),
	foreign key (code_conseil) 		references Exercice (id_exercice)
);



/*
===============
	Insertions:
===============
*/

insert into Coach (nom, prenom, experience, note) values
 
   	('Lejeune' , 'Théophile' , '10 ans', 15),  
	('Alphonse', 'Jodion', ' 5 ans ', 14 ), 
	('Serhan' , 'Wissam' , '3 ans  ', 16),
	('Mechri' , 'Fadi', ' 6 mois ', 18), 
	('Pittis' , 'Thomas' ,'4 ans ' , 16),
	('Harbin' , 'Vachon' ,'6ans', 10 ),
	('Sarrazin' , 'Thibaut', '1 an', 9), 
	('Gougeon' , 'Merlin ' ,'4 ans ' , 13),
	('Gradasso' , 'Savard' ,'6 ans', 13 ),
	('Almeida Barros', 'Breno ', '10 ans', 15);


insert into Adherant values

	('Elhabar' 		, 'Moussa' 		, 'MoussaLebg@uvsq.fr'				,'lastreetzer'		,	60	, 22	, 190 ),
	('Jhon' 		, 'Rachid' 		, 'jhonrachid@jsp.fr'				,'rachid' 			,	80	, 30    , 180 ), 
	('Pinto'		, 'Pio'			, 'PioPinto@teleworm.us' 			,'vioB0eeri9ph' 	, 	90  , 27 	, 160 ),
	('Longo'		, 'Urbano'		, 'UrbanoLongo@dayrep.com' 			,'hdjhdqsjd' 		, 	75  , 35 	, 175 ),
	('Milani' 		,' Arrigo'		, 'ArrigoMilani@dayrep.com'			, 'djkqsdjkqsd'		,   50  , 20 	, 160 ),
	('Trentini'		,'Gabriele'		, 'GabrieleTrentini@armyspy.com'	, 'sdjqsdjkq' 		,   80  , 40 	, 170 ),
	(' Conti'	    , 'Efisio'		, 'EfisioConti@teleworm.us'			,'dnjqkshd'			,   92  , 35 	, 160 ),
	('Milanesi'		,'Oreste'		,'OresteMilanesi@armyspy.com'		,'sqkdskls'			,   55  , 19 	, 170 ),
	('Marseau' 		,'Alphonse'		, 'AlphonseMarseau@jourrapide.com'	, 'sdqdkqksjd'		,   70  , 33 	, 150 ),
	('Hervieux'		,'Iven'			, 'IvenHervieux@dayrep.com'			,'psodkqspd' 		,	50	, 29	, 169 ),
	
	('Mailly'		,'Moore'		, 'MooreMailly@jourrapide.com'		, 'ls^pld^s^ld' 	, 	86 	, 35	, 190 ),
	('Soucy'		,'Odo'		    , 'OdoSoucy@teleworm.us'			, 'djskljsdkqsd' 	, 	80 	, 44	, 168 ),
	('Lécuyer'		,'Scoville'		, 'ScovilleLecuyer@dayrep.com'		, 'dhqjsdjqshnd'	,	50 	, 40    , 186 ),
	('Dupuy'		,'Gaetan'		, 'GaetanDupuy@teleworm.us'			, 'QSQSQS'			,	95	, 27    , 150 ),
	('Duperré'		,'Valiant'		, 'ValiantDuperre@armyspy.com'		, 'sdkjqsjdjndqsd'	,   68  , 44    , 164 ),
	('Loiseau'		,'Dominique'	, 'DominiqueLoiseau@armyspy.com'	, 'shdjhsdqshdb'	,   77 	, 30    , 180 ),
	('Jodion'		,'Matthieu'		, 'MatthieuJodion@armyspy.com'		, 'bfdfdbds'		,   80	, 30	, 170 ),
	('Bouchard'		,'Adrien'		, 'AdrienBouchard@dayrep.com' 		, 'sqdqsdqs'		,   85 	, 25 	, 150 ),
	('Goguen'		,'Verrill'		, 'VerrillGoguen@armyspy.com'		, 'qNQDNQSDQ'		,   90	, 30  	, 160 ),
	('Boileau'		,'Joseph'		, 'JosephBoileau@dayrep.com' 		, 'bshqbshqsbqbhs'	, 	75 	, 25 	, 185 ),

	('Marier'		,'Norris'		, 'NorrisMarier@rhyta.com'			,'sqdsdqs'			, 	60 	, 18 	, 165 ),
	('Hervieux'		,'Verrill'		, 'VerrillHervieux@jourrapide.com'	, 'sfsfqsfsdf'		, 	85 	, 22	, 170 ),
	('Achin'		,'Frontino'		, 'FrontinoAchin@dayrep.com' 		,'qsdqdqdq'			, 	68	, 26	, 178 ),
	('Bonenfant'	,'Guillaume'	, 'GuillaumeBonenfant@rhyta.com'	, 'dqsdqssdf' 		,	80 	, 35 	, 168 ),
	('Étienne '		,'Ruel'			, 'EtienneRuel@teleworm.us' 		, 'fdsfsdfsd'		, 	80 	, 40	, 157 ),
	('Odo'			,'Deniger'		, 'OdoDeniger@teleworm.us'		    , 'dfsdfsdfsd'		, 	75	, 35	, 180 ),
	('Pouchard'		,'Christophe'	, 'ChristophePouchard@rhyta.com'	,'fdsASqsdq'		, 	68  , 19 	, 160 ),
	('Brochu'		,'Jay'			, 'JayBrochu@armyspy.com' 			, 'sdsdsdfdsfs' 	,	80	, 22	, 177 ),
	('Mason '		,'Tanguay'		, 'MasonTanguay@armyspy.com'		, 'dfssdfsdfsdf' 	,	90	, 18	, 174 ),
	('Octave'		,'Margand'		, 'OctaveMargand@armyspy.com' 		, 'fdsasaadaze' 	,	70  , 22 	, 180 ),
	
	('Delmar'		,'Brisette'		, 'DelmarBrisette@teleworm.us' 		,'qssvxvcbv'		, 	95  , 25 	, 160 ),
	('Courtland'	,'Lépicier'		, 'CourtlandLepicier@dayrep.com' 	,'fsdfsdfsdfsd' 	,	80  , 26	, 186 ),
	(' Varieur'		,'Felicien'		, 'FelicienVarieur@teleworm.us' 	,'dsfdfsfsdfs'		,	96	, 35	, 190 ),
	('Charette'		,'Laurent' 		, 'LaurentCharette@dayrep.com'		,'ezrzerzerezrdsf'	,	105 , 40	, 180 ),
	('Chaussée'		,'Nicolas' 		, 'NicolasChaussee@dayrep.com'		,'dsfsdfsdfsf'		,	120	, 30 	, 156 ),
	('Bernier'		,'Russell' 		, 'RussellBernier@jourrapide.com'	,'dsfsfsfsdf6569'	, 	80	, 55 	, 170 ),
	('Talon '		,'Alexandre' 	, 'TalonAlexandre@armyspy.com'		,'dsfsdfsdfsf'		,	90	, 22	, 195 ),
	('Goudreau'		,'Daniel' 		, 'DanielGoudreau@rhyta.com'			,'dfsdfazaezer'	,	86	, 25	, 175 ),
	('Sansouci'		,'Sennet' 		, 'SennetSansouci@armyspy.com'		,'dsfdsfsdfdsd'    	,	90	, 55	, 167 ),
	('Jeoffroi'		,'Rodrigue'		, 'JeoffroiRodrigue@armyspy.com'		,'qsdqsdqdsqd'	,	56 	, 18 	, 160 ),
	
	('Henri'		,'Gaillard' 	, 'HenriGaillard@rhyta.com'			,'ezdazazea'		,	60 	, 20	, 180 ),
	('Leverett'		,'Bossé' 		, 'LeverettBosse@jourrapide.com'		,'fdsfdsfsdsfd'	,	80 	, 22	, 170 ),
	('Grégoire '	,'Quenneville' 	, 'GregoireQueeville@jourrapide.com' ,'dsfdsddfssdf'	,	75 	, 35	, 180 ),
	('Paien'		,'Jodion' 		, 'PaienJodion@jourrapide.com'		,'dsfsdfdfggdg'		,	80 	, 30 	, 180 ),
	('Ogier'		,'Beauchamps' 	, 'OgierBeauchamps@dayrep.com'		,'qsdqsdqs'			,	67	, 33 	, 165 ),
	('Langlois'		,'Guillaume' 	, 'GuillaumeLanglois@rhyta.com'		,'sqvcvvxvcxcv'		,	75 	, 45	, 170 ),
	('Croquetaigne' ,'Sébastien'	, 'SebastienCroquetaigne@dayrep.com' , 'cxwwxwxcwzqzdd'	,	71 	, 19	, 155 ),
	('Lafontaine'	,'Denis ' 		, 'DenisLafontaine@armyspy.com'		,'sdfsdfdsffdsf'	,	85	, 22	, 180 ),
	('Fresne'		,'Isaac' 		, 'IsaacFresne@dayrep.com'			,'ùmqsdkjqsdq' 		,	75 	, 21 	, 165 ),
	('Gradasso'		,'Houle' 		, 'GradassoHoule@armyspy.com'		,'sqjdhsqdjqsbd' 	,	80 	, 32 	, 180 ),
	
	('Hétu'			,'Louis' 		, 'LouisHetu@teleworm.us'			,'dslkqsjsdjoqsi'   ,	95	, 23	, 175 ),
	('Chauvin'		,'Bertrand' 	, 'BertrandChauvin@rhyta.com'		,'qskdksjdhqsdq'	,	65	, 24	, 162 ),
	('Labrecque'	,'Sennet' 		, 'SennetLabrecque@jourrapide.com'	,'mljhbhjbvvghvgh'	,	70  , 30	, 170 ),
	('Piedalue'		,'Patrick' 		, 'PatrickPiedalue@rhyta.com'		,'lmsqdkqsdqsdodn'	,	85  , 48	, 154 ),
	('Henrichon'	,'Thierry' 		, 'ThierryHenrichon@teleworm.us'		,'dslqs;dqpsd'	,	76	, 50 	, 166 ),
	('Picard'		,'Arno' 		, 'ArnoPicard@jourrapide.com'		,'mskpkdpqokods'	,	80 	, 80 	, 180 ),
	('Boncoeur'		,'Charlot' 		, 'CharlotBoncoeur@jourrapide.com'	,'qdbjbskdbqsd'		,	85 	, 25 	, 190 ),
	('Huppé'		,'Vick' 		, 'VickHuppe@rhyta.com'				,'mmlksqposposdq'	,	95  , 22 	, 185 ),
	('Tachel'		,'Archard' 		, 'ArchardTachel@armyspy.com'		, 'mnbqbqggqyq'		,	59	, 22	, 165 ),
	('Forest'		,'Curtis' 		, 'CurtisForest@rhyta.com'			, 'sqsddsqsza'		,	85  , 30	, 150 ),
	
	('Frappier'		,'Julien' 		, 'JulienFrappier@dayrep.com'		,'sqdqsdaa' 		,	85  , 25	, 158 ),
	('Quenneville'	,'Evrard' 		, 'EvrardQuenneville@armyspy.com'	,'qdsddswx<<x' 		,	80	, 33	, 150 ),
	('Desforges'	,'Campbell' 	, 'CampbellDesforges@armyspy.com'	,'ddsfsqqqqds'		,	79 	, 24	, 186 ),
	('Fréchette'	,'Royce'	    , 'RoyceFrechette@rhyta.com'			,'dsfsfdsffd'	,	58	, 33	, 190 ),
	('Leroux'		,'Gano' 		, 'GanoLeroux@teleworm.us'			,'zaazsdsdfd'		, 	70	, 68	, 178 ),
	('Bernier'		,'Fletcher' 	, 'FletcherBernier@armyspy.com'		,'lmsklmkq21654'	,	80	, 19	, 169 ),
	('Chnadonnet'	,'Jacques' 		, 'JacquesChnadonnet@rhyta.com'		,'sfd446465'		,	95  , 22 	, 168 ),
	('Monjeau'		,'Loyal' 		, 'LoyalMonjeau@rhyta.com'			,'zaza45456'		,	85	, 25	, 170 ),
	('Roux'			,'Telford' 		, 'TelfordRoux@dayrep.com'			,'45465654'			,	86	, 36	, 167 ),
	('Desrosiers'	,'Chappell' 	, 'ChappellDesrosiers@teleworm.us'	,'44654564'			,	57 	, 58 	, 160 ),
	
	('Quessy'		,'Orson' 		, 'OrsonQuessy@dayrep.com'			,'qdqsqdqsqsdqs'	, 	59	, 48 	, 168 ),
	('Leduc'		,'Pinabel' 		, 'PinabelLeduc@armyspy.com'			,'sqdqs48848'	,	68  , 40 	, 190 ),
	('Bazinet'		,'Wyatt' 		, 'WyattBazinet@rhyta.com'			,'44884ssdqqsdae'	,	56 	, 87 	, 160 ),
	('Brunault'		,'Jeoffroi' 	, 'JeoffroiBrunault@dayrep.com'		,'4654dsqqfe'		,	48	, 19 	, 189 ),
	('Metivier'		,'Eustache'		, 'EustacheMetivier@teleworm.us'		,'6544dsqdqszaz',	90 	, 22	, 190 ),
	('Soucy'		,'Davet' 		, 'DavetSoucy@dayrep.com'			,'54sqazezaeaz8'	,	68	, 24 	, 170 ),
	('Harquin'		,'Granville' 	, 'GranvilleHarquin@jourrapide.com'	,'qdsfsd4848884'	,	70  , 35	, 180 ),
	('Côté'			,'Isaac' 		, 'IsaacCote@armyspy.com'			,'kjdfndsfd65654'	,   56	, 20	, 170 ),
	('Robitaille'	,'Zacharie' 	, 'ZacharieRobitaille@rhyta.com'		,'dsfsdfmmlp5'  , 	68	, 19	, 198 ),
	('Auberjonois'	,'Porter'		, 'PorterAuberjonois@teleworm.usMajory'	,'qdqsd5464'	,	78	, 18 	, 168 ),

	('Majory'		,'Adrien' 		, 'AdrienMajory@teleworm.us'			,'dsfsd984897'	,	48 	, 18 	, 150 ),
	('Ferland'		,'Romain'		, 'RomainFerland@teleworm.us'			,'bhjfhsdfghsdf', 	68	, 54	, 189 ),
	('Simon'		,'Antoine' 		, 'AntoineSimon@jourrapide.com'			,'ddssdsf5464'	, 	167	, 40	, 170 ),
	('Course'		,'Avenall' 		, 'AvenallCourse@teleworm.us'			,'556585sqdqsd'	, 	120	, 30 	, 180 ),
	('Foucault'		,'Clovis' 		, 'ClovisFoucault@dayrep.com'			,'d564548qs'	, 	150	, 40 	, 150 ),
	('Louineaux'	,'Ignace' 		, 'IgnaceLouineaux@jourrapide.com'		,'445sdqqdsaa'	,	70	, 68 	, 180 ),
	('Gareau'		,'Scoville' 	, 'ScovilleGareau@dayrep.com'			,'654564sdqd'	,	67	, 65	, 180 ),
	('Guernon'		,'Cheney' 		, 'CheneyGuernon@jourrapide.com'		,'sqd15ds56qdd'	, 	59	, 26	, 167 ),
	('Bériault'		,'Eliot' 		, 'EliotBeriault@jourrapide.com'		,'156sqdq5s1d'	,	70  , 55 	, 168 ),

	('Fontaine'		,'Huon' 		, 'HuonFontaine@dayrep.com'				,'5s54sqdqsda9'	,	145 , 30 	, 165 ),
	('Routhier'		,'David' 		, 'DavidRouthier@dayrep.com'			,'56q5dsqdqds8'	,	67  , 40	, 180 ),
	('Therriault'	,'Ignace' 		, 'IgnaceTherriault@dayrep.com'			,'jklkjsdlqjdaz',	87  , 35	, 156 ),
	('Reault'		,'Moore' 		, 'MooreReault@armyspy.com'				,'sqdq,sdknqsd'	,	90	, 30 	, 195 ),
	('Faure'		,'Beltane' 		, 'BeltaneFaure@teleworm.us'			,'hshqshuydgqsd',	95	, 45	, 167 );





insert into Programme (nom, categorie_programme, prix, description, difficulte, avis) values

	('musculation adolescent','musculation',100,'développement des muscles squelettiques, afin dacquérir plus de force, dendurance, de puissance, dexplosivité ou de volume musculaire',015,15),
	('remise en forme en 30 jours','remise en forme',100,'prendre soin de soi, perdre de la graisse, bouger plus, reprendre le sport ou faire plus de sport',012,15),
	('remise a niveau : cardio','cardio',100,'renforce tout votre système cardio-vasculaire',015,15),
	('100 jours pour me relaxer','relaxation',100,'oublie tes probleme et viens danser avec les magic system',020,20),
	('musculation pour les femmes','musculation',150,'choix  de 20 exercices',017,20);


insert into Exercice (id_programme, nom_exercice, categorie_exercice, description, prix_exercice) values

	(001, 'développé couché'   ,'musculation' , 'permet de muscler l’ensemble des muscles de la poitrine et plus particulièrement le muscle grand pectoral', 010),
	(001,'Curl au pupitre'    ,'musculation' , 'les bras sont placés en avant du torse  ce qui réduit l’étirement des biceps et augmente la tension dans la courte portion',030),
	(001,'squat'              ,'musculation' ,'permet de  travailler les muscles des cuisses et les fessiers. Il consiste à effectuer un mouvement de flexion des jambes avec une amplitude importante',000),
	(001,'mollets à la presse','musculation' , 'permet de travailler les mollets avec des charges lourdes',050),
	(001,'dips'               ,'musculation' ,'efficace pour prendre la masse musculaire au niveau des pectoraux  et des triceps',030),
	(001,'extensions verticales','musculation', 'exercice qui permet un développement complet du triceps',006),
	(001,'extensions à la poulie','musculation','sollicite plus efficacement la longue portion du triceps',007),
	(001,'Développé nuque', 'musculation','exercice pour développer les épaules',003),
	(001,'crunch sur banc incliné','musculation',' important pour tous ceux qui veulent se muscler les abdos',050),
	(001,'relevé de jambes','musculation', 'efficace pour muscler les abdos',001),
	(001,'leg extension','musculation',' l’un des meilleurs exercices pour développer et donner de la définition à la partie antérieure de la cuisse (quadriceps)', 010),
	(001,'fente à la barre','musculation','permet de travailler un grand nombre de muscles au niveau des jambes et de manière unilatérale',000),
	(001,'soulevé de terre','musculation','Le soulevé de terre jambes tendues très important pour développer et définir l’arrière de la cuisse et les fessiers',001),
	(001,'Le leg curl','musculation' , 'permet de développer la masse musculaire de la partie postérieure de la cuisse',001),

	
	(002, 'planche abdominale','remise_en_forme','permet de renforcer les muscles superficiels et profonds des abdominaux',000),
	(002, 'relevé du bassin au solo','remise_en_forme',' cible le grand fessier et les ischios jambiers',002),

	(003, 'rameur','cardio','entretenir sa forme et se muscler harmonieusement',030),
	(003, 'le tapis','cardio','Il mobilise un grand nombre de muscles, notamment le coeur',005),
	(003, 'Vélos elliptiques','cardio','permet de travailler tous les muscles du corps, sollicite les cuisses, les fessiers et les mollets',003),
	(003, 'Jumping jacks','cardio','sollicite les muscles du bas du dos',008),
	(003, 'Montées de genoux','cardio',' renforcer ses cuisses et fessiers et brûler des calories',050);






	insert into Conseil_dietetique (id_programme, nom_conseil, categorie_conseil, description, prix_conseil) values

		(001,'Nutrition et performance','musculation','Transformer les aliments en « carburant » et assurer les nombreuses réactions cellulaires grâce aux vitamines',010),
		(002,'manger sans crainte','remise_en_forme','trouver son propre rythme afin de pouvoir maintenir des habitudes alimentaires et atteindre un objectif raisonnable',020),
		(001,'Sportifs mangez pour gagner','musculation','régime alimentaire,toute pratique sportive réclame des menus adaptés',040);

	insert  into Pratique values 
		('2015-02-12','2018-08-12',15,'LeverettBosse@jourrapide.com',001),
		('2013-07-15','2017-01-18',10,'ArchardTachel@armyspy.com',002);

	insert into Coaching_sportif values 

		('2019-09-12',00,01,'CharlotBoncoeur@jourrapide.com',001),
		('2019-09-13',15,02,'LouisHetu@teleworm.us'	,002),
		('2020-07-14',17,04,'CurtisForest@rhyta.com',003),
		('2021-07-20',00,06,'IsaacCote@armyspy.com',003),
		('2021-08-20',15,05,'AntoineSimon@jourrapide.com', 004),
		('2021-09-21',10,08,'ScovilleGareau@dayrep.com', 005),
		('2021-09-23',13,09,'CheneyGuernon@jourrapide.com', 006);
		



 	insert into Coaching_nutrition values
 		('2019-10-12'	,00	,01		,'CharlotBoncoeur@jourrapide.com'	,'regime'		, 001),
		('2019-11-13'	,15	,02		,'LouisHetu@teleworm.us'			,'blalabaezae'	, 002),
		('2020-01-14' 	,17	,03		,'CurtisForest@rhyta.com'			,'hhhhhhhhzeae'	, 003),
		('2021-02-14'	,19	,06     ,'BeltaneFaure@teleworm.us' 		, 'ramadan'		, 004);




# On calcule le prix d'un programme a partir des exercices et conseils qui le composent
 	 update  Programme 
  	 set Programme.prix = (  select sum(D.prix_conseil) + sum(E.prix_exercice)
  	 						from Conseil_dietetique D, Exercice E
  	 						where D.id_programme = Programme.id and E.id_programme = Programme.id
						);




# on a une table concernant les adherant et leur physique (avec un calcul d'imc)
create view  Imc 
  as select Adherant.prenom, Adherant.nom, Adherant.poids , Adherant.taille , 
  (Adherant.poids/power(Adherant.taille/100, 2)) as imc   
  from Adherant;


# ici on veut créer une vue qui affiche les nombre de coaching total 
# de chaque coach 
# pour les coaching sportif
create view  nb_coaching_s
	as 	select Coaching_sportif.numero_coach,
		count(Coaching_sportif.numero_coach) as nb_coaching_sportif, 
		avg(Coaching_sportif.avis) as avis_sportif_moyen
		from  Coaching_sportif 
		group by Coaching_sportif.numero_coach;
# pour les coaching dietetique
create view  nb_coaching_n
	as 	select Coaching_nutrition.numero_coach,
		count(Coaching_nutrition.numero_coach) as nb_coaching_nutrition,
		avg(Coaching_nutrition.avis) as avis_nutrition_moyen
		from  Coaching_nutrition 
		group by Coaching_nutrition.numero_coach;


# classement des coachs par  par leurs note dans tout les coachings
create view classement_coach
	as select N.numero_coach, (N.nb_coaching_nutrition + S.nb_coaching_sportif) as nb_coaching_total, (N.avis_nutrition_moyen+S.avis_sportif_moyen)/2 as avis_global
		from nb_coaching_n N, nb_coaching_s S
		where N.numero_coach = S.numero_coach
		order by avis_global;













