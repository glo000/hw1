<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>

  <?php 
    $conn = mysqli_connect($configDB['host'], $configDB['user'], $configDB['password'], $configDB['name']);
    $userid = mysqli_real_escape_string($conn, $userid);
    $query = "SELECT * FROM users WHERE id = $userid";
    $res_1 = mysqli_query($conn, $query);
    $userinfo = mysqli_fetch_assoc($res_1);   
  ?>

  <head>
    <meta charset="utf-8">
    <title>Spotify - Lettore web: musica per tutti</title>
    <link rel="stylesheet" href="home-page.css">
    <script src="home-page.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@100..900&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>

  <body>
    
    <header>
      <nav>
        <div class="nav-left">
          <div class="flex-item" id="logo"> 
            <img src="spotify.png" />
          </div>

          <div class="flex-item">
            <img id="house" data-text="Home" src="icons8-house-48.png"/>
            
            <img id="ricerca-mobile" src="icons8-find-24.png"/>
          
            <form id="ricerca">
              <div class="flex-item">
                <img src="icons8-find-24.png"/>
                <input type="text" id="search-bar" name="search" data-text="Cosa vuoi ascoltare?" autocomplete="off"> 
              </div>


              <div class="flex-item" id="storage">
                <div class="separatore"></div>
                  <img src="icons8-storage-24.png"/>
              </div>
            </form>
  
          </div>
        </div>

        

        <div id="nav-right">
          <div id="link-left-sep">
            <strong class="item-link"> Premium</strong>
            <strong class="item-link"> Assistenza</strong>
            <strong class="item-link"> Scarica</strong>
          </div>
        
          <div class="separatore"></div>
        
          <div id="link-right-sep">
     
            <a href='profile.php'>PROFILO</a>
            <a href="logout.php">LOGOUT</a>
      
      
          </div>

          <div id="menu">
            <img src="icons8-menu-50.png">
          </div>

        </div>

      </nav>
    </header>

    
    <section>
      <div id="section-left">
        <div class="title-left">
          <h1>La tua libreria</h1>
            <div class="flex-item">
              <img src="plus.png"/>
            </div>
        </div>

<a href="artist_tendenza.php">Artisti consigliati</a>

        <div class="blocco-scorrevole">
          <div class="blocco">
            <h2>Crea la tua prima playlist</h2>
            <p>È facile, ti aiuteremo</p> <br>
            <a class="button" id="playlist">Crea playlist</a>
          </div>

          <div class="blocco">
            <h2>Cerca qualche podcast da seguire</h2>
            <p>Ti aggiorneremo sui nuovi episodi</p> <br>
            <a class="button">Sfoglia i podcast</a>
          </div>
        </div>

        <div id="footer-left">
          <div class="fixed-links">
            <p>Informazioni legali</p>
            <p> Sicurezza e Centro sulla privacy</p>
            <p>Informativa sulla privacy</p>
            <p>Impostazioni cookie</p>
            <p>Info annunci</p>
            <p>Accessibilità</p>
          </div>
          
          <p class="strong">Politica sui cookie</p>
            

          <div class="button-IT">
            <img src="icons8-world-50.png"/>
            <a>Italiano</a>
          </div>
        </div>
      </div>

      <div id="section-right">

        <div id="risultatiRicerca"></div>




<section id="sezione-brani" class="grid-container"></section>
<section id="sezione-artisti" class="grid-container"></section>
<section id="sezione-album" class="grid-container"></section>




        
        <div class="title">
          <h1>Brani di tendenza</h1>
          <h2>Mostra tutto</h2>
        </div>

        <div class="compilation">
          <div class="singolo">
            <img src="casino-nella-mia-testa.jpeg"/>  
              <div>
                <h1>cas!no nella m!a testa (feat. Salmo)</h1>
                  <div class="allign">
                    <img class="explicit" src="icons8-explicit-50.png"/>
                    <a>thasup, Salmo</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="la-voglia-la-pazzia.jpeg"/>  
              <div>
                <h1>La voglia, la pazzia</h1>
                  <div class="allign">
                    <a>Ornella Vanoni, Toquinho, Vinìcius de Moraes</a>
                  </div>
                </div>
          </div>

          <div class="singolo">
            <img src="mondo-di-fango.jpeg"/>  
              <div>
                <h1>Mondo Di Fango</h1>
                  <div class="allign">
                    <img class="explicit" src="icons8-explicit-50.png"/>
                    <a>Gemitaiz</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="nella-pancia-dello-squalo.jpeg"/>  
              <div>
                <h1>Nella pancia dello squalo</h1>
                  <div class="allign">
                    <img class="explicit" src="icons8-explicit-50.png"/>
                    <a>Salmo</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="giornate-vuote.jpeg"/>  
              <div>
                <h1>Giornate vuote (feat. Gemitaiz)</h1>
                  <div class="allign">
                    <a>Frenetik&Orang3, Gemitaiz</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="california-love.jpeg"/>  
              <div>
                <h1>California Love - Original Version</h1>
                  <div class="allign">
                    <img class="explicit" src="icons8-explicit-50.png"/>
                    <a>2Pac, Roger, Dr.Dre</a>
                  </div>
              </div>
          </div>
        </div>

      <div id="mostra-tutto" class="nascondi">

        <div class="compilation">
          <div class="singolo">
            <img src="il-giorno-del-giudizio.jpeg"/>  
              <div>
                <h1>Il Giorno Del Giudizio</h1>
                  <div class="allign">
                    <img class="explicit" src="icons8-explicit-50.png"/>
                    <a>Gemitaiz, Madman</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="scacciapensieri.jpeg"/>  
              <div>
                <h1>Scacciapensieri</h1>
                  <div class="allign">
                    <a>Franco126</a>
                  </div>
                </div>
          </div>

          <div class="singolo">
            <img src="yes-i-know--my-way.jpeg"/>  
              <div>
                <h1>Yes I Know My Way</h1>
                  <div class="allign">
                    <a>Pino Daniele</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="serenata-rap.jpeg"/>  
              <div>
                <h1>Serenata Rap</h1>
                  <div class="allign">
                    <a>Jovanotti</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="shake-that.jpeg"/>  
              <div>
                <h1>Shake That</h1>
                  <div class="allign">
                    <a>Eminem, Nate Dogg</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="bad-reputation.jpeg"/>  
              <div>
                <h1>Bad Reputation</h1>
                  <div class="allign">
                    <a>Half Cocked</a>
                  </div>
              </div>
          </div>
        </div>

        

        <div class="title">
          <h2 id="chiudi-mostra-tutto">Mostra di meno</h2>
        </div>        

      </div>
      
        <div class="title">
          <h1>Artisti più popolari</h1>
          <h2>Mostra tutto</h2>
        </div>

        <div class="compilation">
          <div class="artista">
            <img src="salmo.jpeg"/>
            <h1>Salmo</h1>
            <a>Artista</a>
            <h2 class="hidden">2.500.958 Follower - 2.401.928 Ascoltatori mensili</h2>
            <p class="hidden">Italian rapper and producer Salmo has topped charts and broken streaming records with his aggressive, unruly mixture of hardcore hip-hop, metal, and bass-heavy electronic music. Following work with several rap, metal, and hardcore groups, he made his solo debut with 2011's The Island Chainsaw Massacre, which featured production influenced by grime, dubstep, and drum'n'bass. Subsequent full-lengths Midnite (2013), Hellvisback (2016), and Playlist (2018) all conquered the Italian charts, as Salmo performed to sold-out crowds at arenas throughout Italy and beyond.

              Born Maurizio Pisciottu in the Sardinian town of Olbia, rapper and producer Salmo recorded a few demos as part of the trio Premeditazione e Dolo prior to making his own Sotto Pelle in 2004. He formed nu-metal group Skasico with his Premeditazione e Dolo bandmates, and additionally participated in hardcore punk band To Ed Gein and stoner metal group Three Pigs Trip. His first official album, however, was 2011's The Island Chainsaw Massacre, which was followed by Death U.S.B. in 2012. The Italian MTV Hip-Hop Awards named Salmo Best Crossover. He also took part in the Machete crew, whose first two mixtapes appeared in 2012.
              
              Salmo's third album, Midnite, arrived in 2013, and became his first number one album in Italy. Recorded while on tour in support of Midnite, Sony Music issued the live album/DVD S.A.L.M.O. Documentary in 2014. The rapper's fourth studio LP, Hellvisback, appeared in early 2016 and debuted atop the Italian album chart. It featured blink-182 drummer Travis Barker on two tracks. Salmo performed at numerous European festivals throughout 2017, and his single "Perdonami" quickly reached triple-platinum status in his home country. 2018 full-length Playlist broke several streaming records upon release, with nearly all of its tracks immediately hitting the Top 20. His studio albums from Death USB to Playlist were issued as the LP box set The Complete Vinyl Edition. He produced 2019's Machete Mixtape 4, and his own Playlist Live appeared at the end of the year. He released a series of limited picture-disc singles in 2020 and released "La Canzone Nostra" (with Mace and Blanco) in 2021. ~ Andy Kellman & Marcy Donelson, Rovi</p>
          </div>

          <div class="artista">
            <img src="arisa.jpeg"/>
            <h1>Arisa</h1>
            <a>Artista</a>
            <h2 class="hidden">441.546 Follower - 704.071 Ascoltatori mensili</h2>
            <p class="hidden">Arisa è una delle personalità più importanti del panorama musicale italiano, capace di reinterpretare il concetto stesso di musica e di spettacolo, di dare voce a intere generazioni, colorando di nuove sfumature il mondo dello spettacolo. Il suo esordio è nel 2008 al concorso Sanremolab che la porta a vincere, nel 2009 per la categoria nuove proposte il 59° Festival di Sanremo con il singolo Sincerità. Seguono anni di successi e di hit, tra nuove partecipazioni al Festival di Sanremo con i singoli La notte, vincitore di un Sanremo Hit Award, Controvento, Guardando il cielo, Mi sento bene, Potevi fare di più. Nel corso della sua carriera ha ottenuto importanti riconoscimenti tra cui il Premio Assomusica, Premio della critica Mia Martini, due Wind Music Awards, un Venice Music Awards, il Premio Lunezia, due Nastro d’Argento e molti altri. Arisa non è solo autrice e interprete ma è un’artista poliedrica che è riuscita a farsi spazio anche come ballerina, attrice, doppiatrice e scrittrice, diventando uno dei volti più noti della tv italiana. Nel 2015 viene scelta come co-conduttrice della 65ª edizione del Festival di Sanremo. Tra il 2020 e il 2021 partecipa a vari programmi televisivi, fra cui il talent show Amici di Maria de Filippi, dove ha il ruolo di professoressa e membro della commissione e Ballando con le stelle, che vince insieme al ballerino Vito Coppola. Nel 2023 inizia un nuovo percorso come giudice di The Voice Kids, The Voice Senior e The Voice Generations.</p>
          </div>

          <div class="artista">
            <img src="ghali.jpeg"/>
            <h1>Ghali</h1>
            <a>Artista</a>
            <h2 class="hidden">3.292.869 Follower - 3.048.915 Ascoltatori mensili</h2>
            <p class="hidden">Ghali Amdouni, known as Ghali, is an Italian rapper with Tunisian roots born in Milan in 1993. He’s the icon of the new Italian generation, thanks to his culture mix, his lyrics in Italian, French and Arabic and the blend of authentic European and MENA sounds. His international collabs include Stormzy, Ed Sheeran, Noizy, Soprano, Lacrim, SoolKing and Mr Eazi. His music boasts 45 PLATINUM and 31 GOLD certifications overall. His hit "Cara Italia“ broke the record of Youtube views for an Italian artist in the first 24 hours, debuted N°1 in the Italian Airplay Radio Chart and in the Italian Official Single Chart. His album DNA, released Feb 2020 (PLATINUM certified), debuted at N°1 in the Italian Official Album Chart, while in the same week "Good Times" (3xPLATINUM) and "Boogieman" (2xPLATINUM) reached N°1 and 2 in the Official Single Chart. In May 2022 Ghali released “Sensazione Ultra”; the album mixes international artists such as London On Da Track and Ronny J with icons of the national hip hop movement as Marracash and new raising stars of Italian music as Madame, Baby Gang, Axell and Digital Astro. 2023 ended with the release of a special project, the mixtape “Pizza Kebab -vol1”, with collaboration with Tony Effe, Pyrex, Side Baby, Luchè, Geolier, Simba La Rue, Digital Astro and international act like Draganov and Soolking. After the huge success “Casa mia”, Ghali returns in the summer 2024 with "Paprika".</p>
          </div>

          <div class="artista">
            <img src="giorgia.jpeg"/>
            <h1>Giorgia</h1>
            <a>Artista</a>
            <h2 class="hidden">1.013.621 Follower - 4.667.998 Ascoltatori mensili</h2>
            <p class="hidden">An Italian pop star with enough ennui to even make it worldwide, Giorgia debuted in 1993 with a self-titled album; the single "E Poi" became very popular in her native country. By 1995, she had won the competition at the prestigious San Remo Festival with "Come Saprei." The success of that single made her resulting album, Come Thelma e Louise, her most popular yet. For her third album, Giorgia recorded both live and in the studio; the single "Strano Il Mio Destino" became another big hit, and the album of the same name was another consistent seller. Giorgia also released two concert albums, Natural Woman and One More Go Round, and appeared on projects with such renowned artists as Andrea Bocelli, Elio e Le Storie Tese, and Pino Daniele.

              Mangio Troppa Cioccolata, released in 1997, became the most successful album of her career, but follow-ups like 1999's Girasole, 2001's Senza Ali, and 2003's Ladra Di Vento all reached at least five-times platinum certification. She released an MTV Unplugged set in 2005, and followed with her seventh studio album, Stonata, in 2007.
              
              One year later, Giorgia released the greatest-hits set Spirito Libero: Viaggi di Voce 1992-2008, but was less active recording during the next three years. When she returned, however, with 2011's Dietro Le Apparenze, she earned popular honors; the album hit number one in Italy and spent over a year on the charts. (It also performed well in Switzerland.) Senzo Paura, released at the end of 2013, was another Italian hit, spending all of 2014 and beyond on the charts. ~ John Bush, Rovi</p>
          </div>

          <div class="artista">
            <img src="gemitaiz.jpeg"/>
            <h1>Gemitaiz</h1>
            <a>Artista</a>
            <h2 class="hidden">2.194.640 Follower - 2.017.166 Ascoltatori mensili</h2>
            <p class="hidden">Gemitaiz, born Davide de Luca, is a hard-edged rapper who has achieved major commercial success in Italy, always staying true to his style. Native of the Italian capital Rome, he released dozens of mixtapes and 6 official albums. All of his works went on top of Fimi's chart and achieved golden or platinum. Continuous evolution and the constant desire to leave his audience surprised are the two characteristics that have distinguished him over the years, as well as the ability to adapt to any type of sound. His hoarse voice and poetics are unique in the panorama of Italian music. Probably the most active rapper in Italy.</p>
          </div>

          <div class="artista">
            <img src="amy.jpeg"/>
            <h1>Amy Winehouse</h1>
            <a>Artista</a>
            <h2 class="hidden">9.516.885 Follower - 19.375.543 Ascoltatori mensili</h2>
            <p class="hidden">Amy Winehouse was one of the U.K.'s flagship vocalists during the 2000s. While the British press and tabloids seemed to focus on her rowdy behavior and tragic end, fans and critics alike embraced her rugged charm, brash sense of humor, and distinctively soulful and jazzy vocals. Her platinum-selling, Mercury Prize-nominated album Frank (2003) elicited comparisons ranging from Billie Holiday and Sarah Vaughan to Macy Gray and Lauryn Hill, introducing her unmistakable voice and deeply personal songwriting to the masses. However, it wasn't until 2006 that Winehouse truly landed on the global stage with her sophomore full-length, Back to Black. Teamed with producer Mark Ronson, she crafted a nostalgic, throwback sound heard on hit singles "Rehab" and "You Know I'm No Good." One of the best-selling albums in U.K. history, the set earned Winehouse a record-making five Grammy Awards in 2008. The album would be her last; she passed away in London on July 23, 2011, at the age of 27.

              Born to a taxi-driving father and a pharmacist mother, Winehouse grew up in the Southgate area of northern London. Her upbringing was filled with jazz. Many of the uncles on her mother's side were professional jazz musicians, and her paternal grandmother was romantically involved with British jazz legend Ronnie Scott at one time. At home, she listened to and absorbed her parents' selection of greats: Dinah Washington, Ella Fitzgerald, and Frank Sinatra, among others. However, in her teens, she was drawn to the rebellious spirit of TLC, Salt-N-Pepa, and other American R&B and hip-hop acts of the time. At the age of 16, after she had been expelled from London's Sylvia Young Theatre School, she caught her first break when pop singer Tyler James, a schoolmate and close friend, passed on her demo tape to his A&R representative, who was searching for a jazz vocalist. That opportunity led to her recording contract with Island Records. By the end of 2003, when she was 20 years old, Island had released her debut album, Frank. With contributions from hip-hop producer/keyboardist Salaam Remi, Winehouse's amalgam of jazz, pop, soul, and hip-hop received rave reviews. The album was nominated for the 2004 Mercury Music Prize as well as two Brit Awards, and its lead single, "Stronger Than Me," won an Ivor Novello Award for Best Contemporary Song.
              
              Following Winehouse's debut, the accolades and inquiring interviews appeared concurrently in the press with her tempestuous public life. Several times she showed up to her club or TV performances too drunk to sing an entire set. In 2006, her management company finally suggested that she enter rehab for alcohol abuse, but instead, she dumped the company and transcribed the ordeal into the U.K. Top Ten hit "Rehab," the lead single for her second, critically acclaimed album, Back to Black. With evocative productions from Salaam Remi and British DJ/multi-instrumentalist Mark Ronson, the album somewhat abandoned jazz, delving into the sounds of '50s/'60s-era girl group harmonies, rock & roll, and soul. The fanfare over the release was so great that it started to spill over onto U.S. shores; several rappers and DJs made their own remixes of various songs, not to mention covers by Prince and the Artic Monkeys.

              One month after Winehouse won Best Female Artist at the Brit Awards in February 2007, Universal released Back to Black in the U.S. The LP charted higher than any other American debut by a British female recording artist before it, and it remained in the Top Ten for several months, selling a million copies by the end of that summer. Just as in the U.K., she became the talk of the town, landing on the covers of Rolling Stone and Spin magazines. Not long afterward, though, Winehouse canceled her North American tour. Early reports revealed that she was entering rehab for addiction, but her new management denied the claims, stating it was due to severe exhaustion. Her erratic behavior kept her and her new husband, Blake Fielder-Civil, in the tabloids constantly, on and off stages on both sides of the Atlantic, but in late 2007, American fans were finally given a chance to hear Winehouse's early work, with a slightly abbreviated (two songs removed and one added) version of Frank.

              Unfortunately, the next four years were filled with drama, disappointment, and very little music. By 2009, her marriage had ended in divorce, she had repeatedly been arrested on assault charges and/or public order offenses, and her struggles with substance abuse and mental health issues were tragically played out in the press. Public performances turned into incoherent disasters, the worst of them posted to video-sharing sites for all to see. A track on the Quincy Jones tribute Q: Soul Bossa Nostra appeared in 2010, while a duet with Tony Bennet was announced in early 2011, but a planned follow-up to Back to Black would never make it past the demo stage. Winehouse was found dead in her Camden, London apartment on July 23, 2011. The coroner's report, delivered three months later, revealed that her blood alcohol content had reached a potentially fatal level.
              
              Nearly two months after her death, Winehouse's first posthumous appearance was released on Tony Bennett's Duets II, where she sang with him on "Body and Soul." Near the end of 2011, her family's foundation announced the release of Lioness: Hidden Treasures, a posthumous compilation featuring recordings from throughout her career (although a few of the arrangements were recorded after her death). A year after Lioness came At the BBC, a deluxe CD/DVD set -- available both as a four-disc box and a smaller two-disc compilation -- rounding up all of her live performances for the British Broadcasting Company.
              
              In the summer of 2015, Amy, a documentary by director Asif Kapadia, told her story through photographs, archival footage (in the studio and out), and music. Much of this material had not been available previously. It also contained interviews with friends, family, musical collaborators, and the late singer. That October, a soundtrack was issued that alternated previously released and unreleased Winehouse material with pieces from the film's score. In 2021, another posthumous collection was released as a Record Store Day vinyl exclusive. Remixes collected rare cuts from throughout her career, including takes by Hot Chip and MJ Cole, as well as guest verses by the likes of Jay-Z and Ghostface Killah. ~ Cyril Cordor & Neil Z. Yeung, Rovi</p>
          </div>

        </div>  

        <div class="title">
          <h1>Album e singoli popolari</h1>
          <h2>Mostra tutto</h2>
        </div>

        <div class="compilation">
          <div class="singolo">
            <img src="Il-tempo-che-è-trascorso.jpeg"/>  
              <div>
                <h1>Foto di gruppo</h1>
                  <div class="allign">
                     <a>Bassi Maestro</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="marciapiedi.jpeg"/>  
              <div>
                <h1>CRISTI E DIAVOLI</h1>
                  <div class="allign">
                    <a>Lovegang126</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="la-sera-dei-miracoli.jpeg"/>  
              <div>
                <h1>Dalla</h1>
                  <div class="allign">
                    <a>Lucio Dalla</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="goodbye-kiss.jpeg"/>  
              <div>
                <h1>My Beautiful Bloody Break Up</h1>
                  <div class="allign">
                    <a>Mondo Marcio</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="un-ora-sola-ti-vorrei.jpeg"/>  
              <div>
                <h1>Mangio Troppa Cioccolata</h1>
                  <div class="allign">
                    <a>Giorgia</a>
                  </div>
              </div>
          </div>

          <div class="singolo">
            <img src="bolla-papale.jpeg"/>  
              <div>
                <h1>MM Vol.2</h1>
                  <div class="allign">
                    <a>MadMan</a>
                  </div>
              </div>
          </div>
        </div>   

        <div id="footer-right">
          <div id="footer-links">
            <div>
              <h1>Azienda</h1>
              <p>Chi siamo</p>
              <p>Opportunità di lavoro</p>
              <p>For the Record</p>
            </div>

            <div>
              <h1>Community</h1>
              <p>Per artisti</p>
              <p>Sviluppatori</p>
              <p>Pubblicità</p>
              <p>Investitori</p>
              <p>Venditori</p>
            </div>

            <div>
              <h1>Link utili</h1>
              <p>Assistenza</p>
              <p>App per cellulare gratuita</p>
              <p>Diritti del consumatore</p>
            </div>

            <div>
              <h1>Piani spotify</h1>
              <p>Premium Individual</p>
              <p>Premium Duo</p>
              <p>Premium Family</p>
              <p>Premium Student</p>
              <p>Spotify Free</p>
            </div>

            <div id="social">
              <img src="instagram.png"/>
              <img src="icons8-twitter-bird-30.png"/>
              <img src="icons8-facebook-30.png"/>
            </div>
          </div>

          <div class="separatore"></div>
          <img src="IMG_5.JPG"/>
          <div id="generatore-frasi">
            <div id="gen-sin">
              <div>
                <h1>Musica per l'anima, parole per il cuore</h1>
                <h2>Spotify tiene a te e alla tua salute! Ecco una paio di consigli per affrontare meglio la giornata.</h2>
                <h2> Leggine un paio, poi schiaccia play!</h2>
              </div>
              <div>
                <p id="gen-button">Mostra</p>
              </div>
            </div>
            <div id="gen-des">
              <div id="advice-box"></div>
            </div>
          </div>


          <div class="separatore"></div>

          <div id="c">
            <img src="icons8-c-24.png">
            <a>2025 Spotify AB</a>
          </div>
        </div>
      </div>
    </section>

    <div id="modal-view" class="hidden"></div> 

    <div id=creaPlaylist class="hidden">
      <h1>Crea una playlist</h1>
      <p>Accedi per creare e condividere playlist</p>
      <div id="buttons-playlist">
        <strong id="close">Non ora</strong>
        <strong class="button">Accedi</strong>
      </div>
    </div>

    <footer>
      <div id="interno-sfondo">
        <div>
          <h1>Anteprima di Spotify</h1>
          <p>Iscriviti per ricevere brani e podcast illimitati con annunci pubblicitari occasionali. Non è necessaria alcuna carta di credito.</p>
        </div>
        <div class="button">
          <a>Iscriviti gratis</a>
        </div>
      </div>
    </footer>
  </body>
</html>