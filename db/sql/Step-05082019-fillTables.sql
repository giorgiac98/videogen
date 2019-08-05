INSERT INTO public.console(nome)
VALUES ('PlayStation 4'), ('Xbox One'), ('PC');

INSERT INTO public.videogiochi(titolo, descrizione, produttore, img_path)
	VALUES ('FIFA 19', 'Grazie al motore Frostbite™, EA SPORTS™ FIFA 19 offre un''esperienza da campioni, dentro e fuori dal campo. Con l''aggiunta della prestigiosa UEFA Champions League, FIFA 19 offre funzionalità di gioco migliorate che ti permettono di controllare tutto ciò che avviene in campo in qualsiasi momento, garantendoti una libertà d''azione senza precedenti. Include l''emozionante finale della storia di Alex Hunter con Il Viaggio: Campioni*, una nuova modalità all''interno dell''ormai popolarissimo FIFA Ultimate Team™, e molto altro ancora. FIFA 19 ti permette di giocare ai più importanti tornei per club, grazie a una serie di modalità su licenza che comprendono la UEFA Champions League, la UEFA Europa League e la UEFA Super Cup. Modalità: La UEFA Champions League, la UEFA Europa League e la UEFA Super Cup prendono vita in EA SPORTS FIFA 19. Dalla rincorsa al titolo ne Il Viaggio: Campioni, agli aggiornamenti live in FIFA 19 Ultimate Team, dall''integrazione autentica nelle modalità Calcio d''inizio e Carriera, fino alla nuova modalità Champions League, potrai vivere la più grande competizione calcistica per club al mondo in FIFA 19.  Modalità Champions League: Vivi tutte le emozioni del torneo ufficiale della UEFA Champions League, dalla fase a gironi fino alla gloriosa finale. O gioca una versione personalizzata del torneo con un club europeo a tua scelta. Elementi ufficiali UEFA: Lasciati coinvolgere dai tornei per club più prestigiosi d''Europa con le grafiche televisive, le divise, gli stemmi, i palloni e i trofei ufficiali della UEFA Champions League, UEFA Europa League e UEFA Super Cup.',
			'Electronic Arts', 'media\fifa19.jpg'),
			('Assassin''s Creed Odyssey', 'Forgia il tuo destino in Assassin''s Creed Odyssey. Vivi una vera e propria odissea per svelare i segreti del tuo passato, cambia il destino dell''antica Grecia e diventa una leggenda vivente. ESPLORA L''ANTICA GRECIA Attraversa rigogliose foreste, isole vulcaniche e vivaci città imbarcandoti in un viaggio ricco di scoperte e incontri in giro per un mondo in guerra plasmato da uomini e dèi. SCRIVI LA TUA LEGGENDA Ogni tua decisione influenzerà lo svolgimento del tuo viaggio. Scopri finali alternativi grazie al nuovo sistema di dialoghi e alle scelte che dovrai compiere. Personalizza la tua nave, l''attrezzatura e abilità speciali per diventare una leggenda. UNA NUOVA DIMENSIONE DI COMBATTIMENTO Dimostra le tue abilità in combattimento in battaglie su larga scala tra Atene e Sparta con centinaia di soldati, o manda a picco intere flotte in spettacolari battaglie navali nel Mar Egeo.',
			'Ubisoft', 'media\ac_odyssey.jpg'),
			('Star Wars Battlefront II', 'Preparati a tornare sul fronte della battaglia nel nuovo episodio della serie di Star Wars in alta definizione più venduta di sempre. Diventa l''eroe e combatti nei panni di un intrepido soldato, pilota un leggendario caccia stellare, controlla il tuo personaggio di Star Wars preferito o segui le gesta di un soldato scelto delle forze speciali in una nuova e appassionante storia di Star Wars.',
			'Electronic Arts', 'media\battlefront2.jpg'),
			('The Division 2', 'Sono trascorsi sette mesi da quando un virus letale ha colpito la città di New York e il resto del mondo, decimando la popolazione. Quando il virus si è diffuso, è stata attivata come ultima linea difensiva la Divisione, un''unità dormiente di agenti civili. Da allora, gli agenti della Divisione hanno combattuto senza sosta per salvare ciò che restava della civiltà. Per la Divisione, la posta in gioco è più alta che mai, poiché il mondo è sull''orlo del collasso. Washington, D.C. è in serio pericolo e se dovesse cadere, anche l''intera nazione sarà spacciata. Come agente della Divisione che ha operato sul campo negli ultimi sette mesi, tu e la tua squadra siete l''ultima speranza per arrestare la distruzione della società dopo la diffusione dell''epidemia.',
			'Ubisoft', 'media\the_division2.jpg');

INSERT INTO public.giochi_console(id_gioco, id_console, prezzo, qta)
VALUES (1, 1, 29.00, 10),
	(1, 2, 29.98, 10),
	(1, 3, 24.99, 10),
	(2, 1, 30.99, 10),
	(2, 2, 36.60, 10),
	(2, 3, 30.99, 10),
	(3, 1, 19.90, 10),
	(3, 2, 19.90, 10),
	(3, 3, 16.99, 10),
	(4, 1, 30.00, 10),
	(4, 2, 40.99, 10),
	(4, 3, 30.99, 10);
