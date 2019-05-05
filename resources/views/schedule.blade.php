@extends('_app')

@section('content')
    <div id="schedule" v-cloak>

        <div class="table-date">
            <div v-for="date in dates.slice(0, 14)">
                <div>
                    <span> @{{ date.day }}</span>
                    <span> @{{ date.month }}</span>
                </div>
            </div>

            <!-- bye week -->
            <div>
                <div>
                    <span> @{{ league_bye.day }}</span>
                    <span> @{{ league_bye.month }}</span>
                </div>
            </div>

            <div v-for="date in dates.slice(15, 21)">
                <div>
                    <span> @{{ date.day }}</span>
                    <span> @{{ date.month }}</span>
                </div>
            </div>
        </div>

        <div class="table-game">
            <div v-for="game in games.slice(0, 29)">
                <div class="game">
                    <span class="home">
                        <svg :class="franchiseClass(game.home.franchise_tag)">
                            <use :xlink:href="franchiseIcon(game.home.franchise_tag)" x="0" y="0" />
                        </svg>

                        <span>@{{ game.home.franchise_tag }}</span>
                        <span>@{{ game.home.franchise }}</span>
                    </span>

                    <span class="visitor">
                        <svg :class="franchiseClass(game.visitor.franchise_tag)">
                            <use :xlink:href="franchiseIcon(game.visitor.franchise_tag)" x="0" y="0" />
                        </svg>

                        <span>@{{ game.visitor.franchise_tag }}</span>
                        <span>@{{ game.visitor.franchise }}</span>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <span>@{{ game.time.clock }}</span>
                </div>

                <div v-if="game.final != null" class="final">
                    <span>@{{ game.final }}</span>

                    <span class="score">
                        <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span>
                    </span>
                </div>

                <div class="border"></div>
            </div>

            <!-- extra night bye (kept element structure for layout) -->

            <div v-for="game in games.slice(29, 30)">
                <div class="game">
                    <span class="home">

                        <span><strong>bye</strong></span>
                        <span><strong>bye</strong></span>
                    </span>

                    <span class="visitor">
                        <svg class="franchise-inf">
                            <use xlink:href="#inf" x="0" y="0" />
                        </svg>

                        <svg class="franchise-wol">
                            <use xlink:href="#wol" x="0" y="0" />
                        </svg>

                        <svg class="franchise-fip">
                            <use xlink:href="#fip" x="0" y="0" />
                        </svg>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <!-- <span>@{{ game.time.clock }}</span> -->
                </div>

                <div v-if="game.final != null" class="final">
                    <!-- <span>@{{ game.final }}</span>

                    <span class="score">
                        <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span>
                    </span> -->
                </div>

                <div class="border"></div>
            </div>

            <!-- bye week -->
            <div class="league-bye">
                <div>
                    <svg class="franchise-inf">
                        <use xlink:href="#inf" x="0" y="0" />
                    </svg>

                    <svg class="franchise-frc">
                        <use xlink:href="#frc" x="0" y="0" />
                    </svg>

                    <svg class="franchise-wol">
                        <use xlink:href="#wol" x="0" y="0" />
                    </svg>

                    <svg class="franchise-upw">
                        <use xlink:href="#upw" x="0" y="0" />
                    </svg>

                    <svg class="franchise-fip">
                        <use xlink:href="#fip" x="0" y="0" />
                    </svg>
                </div>
            </div>
            <div>
                <div></div>
            </div>

            <div v-for="game in games.slice(30, 36)">

                <div class="game">
                    <span class="home">
                        <svg :class="franchiseClass(game.home.franchise_tag)">
                            <use :xlink:href="franchiseIcon(game.home.franchise_tag)" x="0" y="0" />
                        </svg>

                        <span>@{{ game.home.franchise_tag }}</span>
                        <span>@{{ game.home.franchise }}</span>
                    </span>

                    <span class="visitor">
                        <svg :class="franchiseClass(game.visitor.franchise_tag)">
                            <use :xlink:href="franchiseIcon(game.visitor.franchise_tag)" x="0" y="0" />
                        </svg>

                        <span>@{{ game.visitor.franchise_tag }}</span>
                        <span>@{{ game.visitor.franchise }}</span>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <span>@{{ game.time.clock }}</span>
                </div>

                <div v-if="game.final != null" class="final">
                    <span>@{{ game.final }}</span>

                    <span class="score">
                        <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span>
                    </span>
                </div>

                <div class="border"></div>
            </div>

            <!-- playoffs -->

            <div v-for="game in games.slice(36, 37)">
                <div class="game">
                    <span class="home">

                        <span>1st place</span>
                        <span>1st place</span>
                    </span>

                    <span class="visitor">

                        <span>4th place</span>
                        <span>4th place</span>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <span>@{{ game.time.clock }}</span>
                </div>

                <div v-if="game.final != null" class="final">
                    <span>@{{ game.final }}</span>

                    <span class="score">
                        <!-- <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span> -->
                    </span>
                </div>

                <div class="border"></div>
            </div>

            <div v-for="game in games.slice(37, 38)">
                <div class="game">
                    <span class="home">

                        <span>2nd place</span>
                        <span>2nd place</span>
                    </span>

                    <span class="visitor">

                        <span>3rd place</span>
                        <span>3rd place</span>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <span>@{{ game.time.clock }}</span>
                </div>

                <div v-if="game.final != null" class="final">
                    <span>@{{ game.final }}</span>

                    <span class="score">
                        <!-- <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span> -->
                    </span>
                </div>

                <div class="border"></div>
            </div>

            <div v-for="game in games.slice(38, 39)">
                <div class="game">
                    <span class="home">

                        <span>winner SF1</span>
                        <span>winner SF1</span>
                    </span>

                    <span class="visitor">

                        <span>winner SF2</span>
                        <span>winner SF2</span>
                    </span>
                </div>

                <div v-if="game.final === null" class="time">
                    <span>@{{ game.time.clock }}</span>
                </div>

                <div v-if="game.final != null" class="final">
                    <span>@{{ game.final }}</span>

                    <span class="score">
                        <!-- <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span> -->
                    </span>
                </div>

                <div class="border"></div>
            </div>

            <div v-for="game in games.slice(38, 39)">
                <div class="game">
                    <span class="home"></span>

                    <span class="visitor"></span>
                </div>

                <div v-if="game.final === null" class="time">
                    <!-- <span>@{{ game.time.clock }}</span> -->
                </div>

                <div v-if="game.final != null" class="final">
                    <!-- <span>@{{ game.final }}</span> -->

                    <span class="score">
                        <!-- <span class="home-score">@{{ game.home_score }}</span>
                        <span class="visitor-score">@{{ game.visitor_score }}</span> -->
                    </span>
                </div>

                <div class="border"></div>
            </div>
        </div>

        <div class="table-bye">
            <div v-for="bye in byes.slice(0, 14)">
                <div>
                    <span>bye</span>

                    <span class="visitor">
                        <svg :class="franchiseClass(bye.franchise.franchise_tag)">
                            <use :xlink:href="franchiseIcon(bye.franchise.franchise_tag)" x="0" y="0" />
                        </svg>
                    </span>
                </div>
            </div>

            <!-- bye week -->
            <div>
                <div>
                    <span>bye</span>
                </div>
            </div>

            <div v-for="bye in byes.slice(15, 19)">
                <div>
                    <span>bye</span>

                    <span class="visitor">
                        <svg :class="franchiseClass(bye.franchise.franchise_tag)">
                            <use :xlink:href="franchiseIcon(bye.franchise.franchise_tag)" x="0" y="0" />
                        </svg>
                    </span>
                </div>
            </div>

            <div v-for="bye in byes.slice(19, 21)">
                <div>
                    <span>P/O</span>
                </div>
            </div>
        </div>
    </div>
@endsection
