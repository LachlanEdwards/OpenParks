	<div class="javascript flex flex-center flex-column">
        <p class="center-text">JavaScript has been disabled within your browser, the content or the functionality of this web page can be limited or unavailable.</p>
    </div>
    <script>
        document.querySelector('.javascript').style.display = 'none';
    </script>
    <div class="main">
        <header>
            <nav class="navigation block">
                <div class="left">
                    <div class="logo inline">
                        <a href="home.php"><img src="images/logo.png" alt="Brisbane City Council logo.png"></a><a href="home.php" class="brand-name">OpenParks</a>
					</div>
                </div>
                <div class="right flex flex-center flex-column">
                    <div class="search f-right block">
                        <div class="small-search">
                            <form id="parksearch" action="./results.php" method="POST">
                                <datalist id="suburbs">
                    <option value="ACACIA RIDGE"></option>
                    <option value="ALBION"></option>
                    <option value="ALDERLEY"></option>
                    <option value="ANNERLEY"></option>
                    <option value="ANSTEAD"></option>
                    <option value="ARCHERFIELD"></option>
                    <option value="ASCOT"></option>
                    <option value="ASHGROVE"></option>
                    <option value="ASPLEY"></option>
                    <option value="AUCHENFLOWER"></option>
                    <option value="BALD HILLS"></option>
                    <option value="BALMORAL"></option>
                    <option value="BANYO"></option>
                    <option value="BARDON"></option>
                    <option value="BELLBOWRIE"></option>
                    <option value="BELMONT"></option>
                    <option value="BOONDALL"></option>
                    <option value="BOWEN HILLS"></option>
                    <option value="BRACKEN RIDGE"></option>
                    <option value="BRIDGEMAN DOWNS"></option>
                    <option value="BRIGHTON"></option>
                    <option value="BRISBANE"></option>
                    <option value="BRISBANE CITY"></option>
                    <option value="BROOKFIELD"></option>
                    <option value="BULIMBA"></option>
                    <option value="BULWER"></option>
                    <option value="BURBANK"></option>
                    <option value="CALAMVALE"></option>
                    <option value="CAMP HILL"></option>
                    <option value="CANNON HILL"></option>
                    <option value="CAPALABA WEST"></option>
                    <option value="CARINA"></option>
                    <option value="CARINA HEIGHTS"></option>
                    <option value="CARINDALE"></option>
                    <option value="CAROLE PARK"></option>
                    <option value="CARSELDINE"></option>
                    <option value="CHANDLER"></option>
                    <option value="CHAPEL HILL"></option>
                    <option value="CHELMER"></option>
                    <option value="CHERMSIDE"></option>
                    <option value="CHERMSIDE WEST"></option>
                    <option value="CHUWAR"></option>
                    <option value="CLAYFIELD"></option>
                    <option value="COOPERS PLAINS"></option>
                    <option value="COORPAROO"></option>
                    <option value="CORINDA"></option>
                    <option value="COWAN COWAN"></option>
                    <option value="DARRA"></option>
                    <option value="DEAGON"></option>
                    <option value="DOOLANDELLA"></option>
                    <option value="DREWVALE"></option>
                    <option value="DURACK"></option>
                    <option value="DUTTON PARK"></option>
                    <option value="EAGLE FARM"></option>
                    <option value="EAST BRISBANE"></option>
                    <option value="EIGHT MILE PLNS"></option>
                    <option value="ELLEN GROVE"></option>
                    <option value="ENOGGERA"></option>
                    <option value="ENOGGERA RESVR"></option>
                    <option value="EVERTON PARK"></option>
                    <option value="FAIRFIELD"></option>
                    <option value="FERNY GROVE"></option>
                    <option value="FIG TREE POCKET"></option>
                    <option value="FITZGIBBON"></option>
                    <option value="FOREST LAKE"></option>
                    <option value="GAYTHORNE"></option>
                    <option value="GEEBUNG"></option>
                    <option value="GORDON PARK"></option>
                    <option value="GRACEVILLE"></option>
                    <option value="GRANGE"></option>
                    <option value="GREENSLOPES"></option>
                    <option value="GUMDALE"></option>
                    <option value="HAMILTON"></option>
                    <option value="HAWTHORNE"></option>
                    <option value="HEATHWOOD"></option>
                    <option value="HEMMANT"></option>
                    <option value="HENDRA"></option>
                    <option value="HERSTON"></option>
                    <option value="HIGHGATE HILL"></option>
                    <option value="HOLLAND PARK"></option>
                    <option value="HOLLAND PK WEST"></option>
                    <option value="INALA"></option>
                    <option value="INDOOROOPILLY"></option>
                    <option value="JAMBOREE HTS"></option>
                    <option value="JINDALEE"></option>
                    <option value="KANGAROO POINT"></option>
                    <option value="KARANA DOWNS"></option>
                    <option value="KARAWATHA"></option>
                    <option value="KEDRON"></option>
                    <option value="KELVIN GROVE"></option>
                    <option value="KENMORE"></option>
                    <option value="KENMORE HILLS"></option>
                    <option value="KEPERRA"></option>
                    <option value="KHOLO"></option>
                    <option value="KOORINGAL"></option>
                    <option value="KURABY"></option>
                    <option value="LAKE MANCHESTER"></option>
                    <option value="LOTA"></option>
                    <option value="LUTWYCHE"></option>
                    <option value="LYTTON"></option>
                    <option value="MACGREGOR"></option>
                    <option value="MACKENZIE"></option>
                    <option value="MANLY"></option>
                    <option value="MANLY WEST"></option>
                    <option value="MANSFIELD"></option>
                    <option value="MCDOWALL"></option>
                    <option value="MIDDLE PARK"></option>
                    <option value="MILTON"></option>
                    <option value="MITCHELTON"></option>
                    <option value="MOGGILL"></option>
                    <option value="MOOROOKA"></option>
                    <option value="MORNINGSIDE"></option>
                    <option value="MT COOT-THA"></option>
                    <option value="MT CROSBY"></option>
                    <option value="MT GRAVATT"></option>
                    <option value="MT GRAVATT EAST"></option>
                    <option value="MT OMMANEY"></option>
                    <option value="MURARRIE"></option>
                    <option value="NEW FARM"></option>
                    <option value="NEWMARKET"></option>
                    <option value="NEWSTEAD"></option>
                    <option value="NORMAN PARK"></option>
                    <option value="NORTHGATE"></option>
                    <option value="NUDGEE"></option>
                    <option value="NUDGEE BEACH"></option>
                    <option value="NUNDAH"></option>
                    <option value="OXLEY"></option>
                    <option value="PADDINGTON"></option>
                    <option value="PALLARA"></option>
                    <option value="PARKINSON"></option>
                    <option value="PINJARRA HILLS"></option>
                    <option value="PINKENBA"></option>
                    <option value="PULLENVALE"></option>
                    <option value="RANSOME"></option>
                    <option value="RED HILL"></option>
                    <option value="RICHLANDS"></option>
                    <option value="RIVERHILLS"></option>
                    <option value="ROBERTSON"></option>
                    <option value="ROCHEDALE"></option>
                    <option value="ROCKLEA"></option>
                    <option value="RUNCORN"></option>
                    <option value="SALISBURY"></option>
                    <option value="SANDGATE"></option>
                    <option value="SEVEN HILLS"></option>
                    <option value="SHERWOOD"></option>
                    <option value="SHORNCLIFFE"></option>
                    <option value="SINNAMON PARK"></option>
                    <option value="SOUTH BRISBANE"></option>
                    <option value="SPRING HILL"></option>
                    <option value="ST LUCIA"></option>
                    <option value="STAFFORD"></option>
                    <option value="STAFFORD HTS"></option>
                    <option value="STRETTON"></option>
                    <option value="SUMNER"></option>
                    <option value="SUNNYBANK"></option>
                    <option value="SUNNYBANK HILLS"></option>
                    <option value="SVTN MILE ROCKS"></option>
                    <option value="TAIGUM"></option>
                    <option value="TARINGA"></option>
                    <option value="TARRAGINDI"></option>
                    <option value="TENNYSON"></option>
                    <option value="THE GAP"></option>
                    <option value="TINGALPA"></option>
                    <option value="TOOWONG"></option>
                    <option value="UPR BROOKFIELD"></option>
                    <option value="UPR KEDRON"></option>
                    <option value="UPR MT GRAVATT"></option>
                    <option value="VALLEY"></option>
                    <option value="VIRGINIA"></option>
                    <option value="WACOL"></option>
                    <option value="WAKERLEY"></option>
                    <option value="WAVELL HEIGHTS"></option>
                    <option value="WEST END"></option>
                    <option value="WESTLAKE"></option>
                    <option value="WILLAWONG"></option>
                    <option value="WILSTON"></option>
                    <option value="WINDSOR"></option>
                    <option value="WISHART"></option>
                    <option value="WOOLLOONGABBA"></option>
                    <option value="WOOLOOWIN"></option>
                    <option value="WYNNUM"></option>
                    <option value="WYNNUM WEST"></option>
                    <option value="YEERONGPILLY"></option>
                    <option value="YERONGA"></option>
                    <option value="ZILLMERE"></option>
                  </datalist>
                                <input type="hidden" name="search-category" value="name">
								<ul class="option none-list-style">
									<li onclick="input.option('name');document.forms['parksearch'].elements['search-category'].value='name';" class="option-item name active">Name</li>
									<li onclick="input.option('location');document.forms['parksearch'].elements['search-category'].value='location';" class="option-item location">Location</li>
									<li onclick="input.option('suburb');document.forms['parksearch'].elements['search-category'].value='suburb';" class="option-item suburb">Suburb</li>
									<li onclick="input.option('rating');document.forms['parksearch'].elements['search-category'].value='rating';" class="option-item rating">Rating</li>
								</ul>
                                <div class="small-input-wrapper">
                                    <input type="text" name="search" placeholder="Search by Name" onkeyup="input.small();" class="search-input small-search-input border-box">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="navul block">
                        <ul class="nav inline">
							<?php 
							if (!isset($_SESSION['logged_in'])) {
								echo "<li class='nav-item nav-left inline-block f-right center-text a-item '> <a href='signup.php'>Sign-up</a></li>";
								echo "<li class='nav-item nav-left inline-block f-right center-text a-item '> <a href='login.php'>Log-in</a></li>";
							}
							else {
								echo "<li class='nav-item nav-left inline-block f-right center-text a-item '> <a href='inc/logout.php'>Logout</a></li>";
								echo "<li class='nav-item nav-left inline-block f-right center-text a-item '> <a href='./home.php'>Welcome, {$_SESSION['logged_user']}.</a></li>";
							}
							?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>