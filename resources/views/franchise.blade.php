@extends('_app')

@section('content')
    <div id="franchise" v-cloak>
        <div class="header" v-for="franchise in franchises" v-if="franchise.id === {{$id}}">
            <span :class="franchiseClass(franchise.id)">@{{ franchise.franchise }}</span>
            <span :class="franchiseClass(franchise.id)">@{{ franchise.standing.wins }}-@{{ franchise.standing.losses }}-@{{ franchise.standing.overtime_losses }}</span>
        </div>
        
        <div class="table">
            <span class="spacer"></span>
            <div>
                <span>#</span>
                <span>player</span>
                <span>gp</span>
                <span>g</span>
                <span>a</span>
                <span>p</span>
            </div>

            <div v-for="points in orderedPoints" v-if="points.franchise_id === {{$id}} && points.position === 'S'">
                <span>@{{ points.jersey_number }}</span>
                <span>@{{ points.member.full_name }}</span>
                <span>@{{ points.games_played }}</span>
                <span>@{{ points.goals }}</span>
                <span>@{{ points.assists }}</span>
                <span>@{{ points.points }}</span>
            </div>
        </div>

        <div class="table">
            <div>
                <span>#</span>
                <span>player</span>
                <span>gp</span>
                <span>w</span>
                <span>ga</span>
                <span>gaa</span>
            </div>

            <div v-for="points in orderedPoints" v-if="points.franchise_id === {{$id}} && points.position === 'G'">
                <span>@{{ points.jersey_number }}</span>
                <span>@{{ points.member.full_name }}</span>
                <span>@{{ points.games_played }}</span>
                <span>@{{ points.wins }}</span>
                <span>@{{ points.goals_against }}</span>
                <span>@{{ points.goals_against_average }}</span>
            </div>
        </div>
     
    </div>
@endsection