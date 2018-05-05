@extends('_app')

@section('content')
    <div id="landing" v-cloak>
        <div class="container outer-1">
            <div class="inner schedule">
                <div class="date" v-for="date in dates">
                    <div>
                        <span class="day">@{{ date.day }}</span>
                    
                        <span class="month">@{{ date.month }}</span>
                    </div>

                    <div>
                        <a href="{{ url('schedule') }}">
                            <svg class="calander">
                                <use xlink:href="#calander" x="0" y="0" />
                            </svg>
                        </a>
                    </div>
                    
                </div>

                <div class="game" v-for="game in games">
                    <div>
                        <span class="home">
                            <svg :class="franchiseClass(game.home.franchise_tag)">
                                <use :xlink:href="franchiseIcon(game.home.franchise_tag)" x="0" y="0" />
                            </svg>
                            
                            @{{ game.home.franchise_tag }}
                        </span>

                        <span class="visitor">
                            <svg :class="franchiseClass(game.visitor.franchise_tag)">
                                <use :xlink:href="franchiseIcon(game.visitor.franchise_tag)" x="0" y="0" />
                            </svg>
                            
                            @{{ game.visitor.franchise_tag }}
                        </span>
                    </div>
                    <div class="time">@{{ game.time.clock }}</div>
                </div>

                <div class="bye" v-for="bye in byes">
                    <div>        
                        <span class="home">
                            <svg :class="franchiseClass(bye.franchise.franchise_tag)">
                                <use :xlink:href="franchiseIcon(bye.franchise.franchise_tag)" x="0" y="0" />
                            </svg>

                            @{{ bye.franchise.franchise_tag }}
                        </span>
                    </div>

                    <div>bye</div>               
                </div>
            </div>

            <div class="inner performance">
                <div>
                    <svg class="gibbston-valley">
                        <use xlink:href="#gv-logo" x="0" y="0" />
                    </svg>

                    <span>top performance</span>
                    <span>@{{ performance }}</span>
                    

                    <svg class="background-wine">
                        <use xlink:href="#wine" x="0" y="0" />
                    </svg>
                </div>

                <!-- <span>history</span> -->
            </div>

            <div class="inner standings">
                <div>
                    <span>standings</span>
                    <span>gp</span>
                    <span>w</span>
                    <span>l</span>
                    <span>otl</span>
                    <span>pts</span>
                    <span>gf</span>
                    <span>ga</span>
                </div>
                
                <div v-for="standings in orderedStanding">
                    <span>@{{ standings.franchise }}</span>
                    <span>@{{ standings.standing.games_played}}</span>
                    <span>@{{ standings.standing.wins}}</span>
                    <span>@{{ standings.standing.losses}}</span>
                    <span>@{{ standings.standing.overtime_losses}}</span>
                    <span>@{{ standings.standing.points}}</span>
                    <span>@{{ standings.standing.goals_for}}</span>
                    <span>@{{ standings.standing.goals_against}}</span>
                </div>
            </div>
        </div>

        <div class="container outer-2">
            <tabs class="roster">	   
                <tab name="points" :selected="true">
                    <div>
                        <span></span>
                        <span></span>
                        <span>gp</span>
                        <span>p</span>
                    </div>

                    <div v-for="points in orderedPoints.slice(0, 15)">
                        <span>@{{ points.member.full_name}}</span>
                        <span>
                            <svg :class="franchiseClass(points.franchise.franchise_tag)">
                                <use :xlink:href="franchiseIcon(points.franchise.franchise_tag)" x="0" y="0" />
                            </svg>
                        </span>
                        <span>@{{ points.games_played}}</span>
                        <span>@{{ points.points}}</span>
                    </div>
                </tab>
                <tab name="goals">
                    <div>
                        <span></span>
                        <span></span>
                        <span>gp</span>
                        <span>g</span>
                    </div>

                    <div v-for="goals in orderedGoals.slice(0, 15)">
                        <span>@{{ goals.member.full_name}}</span>
                        <span>
                            <svg :class="franchiseClass(goals.franchise.franchise_tag)">
                                <use :xlink:href="franchiseIcon(goals.franchise.franchise_tag)" x="0" y="0" />
                            </svg>
                        </span>
                        <span>@{{ goals.games_played}}</span>
                        <span>@{{ goals.goals}}</span>
                    </div>
                </tab>
                <tab name="assists">
                    <div>
                        <span></span>
                        <span></span>
                        <span>gp</span>
                        <span>a</span>
                    </div>

                    <div v-for="assists in orderedAssists.slice(0, 15)">
                        <span>@{{ assists.member.full_name}}</span>
                        <span>
                            <svg :class="franchiseClass(assists.franchise.franchise_tag)">
                                <use :xlink:href="franchiseIcon(assists.franchise.franchise_tag)" x="0" y="0" />
                            </svg>
                        </span>
                        <span>@{{ assists.games_played}}</span>
                        <span>@{{ assists.assists}}</span>
                    </div>
                </tab>
            </tabs>
        </div>
    </div>
@endsection