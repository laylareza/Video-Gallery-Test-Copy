<template>
    <div class="video-card">       
        <a :href="'/videos/' + video.video_id">
            <b-img class="video"></b-img>
            <button class="watch-btn"><span> <img class="play" src="/play.png" ></span></button>
        </a>
        <div class="video-title">
            {{video.title}}
        </div>
        <div class="video-description">
            {{video.description}}
        </div>
    </div>
</template>


<script>
    export default {
        props: {
            video: {
                type: Object,
                default:() => {}
            }
        }
    }
</script>


<style>
    .video-card {
        flex: 0 0 30.333333%;
        height: 200px;
        position: relative;
        margin-bottom: 150px;
    }

    .video {
        width: 100%;
        height: 100%;
        background-color: #013B2F;
    }

    .video:hover {
        border: 15px solid #08785e;
    }

    .watch-btn {
        position: absolute; 
        bottom: calc(50% - 15px); 
        left: calc(50% - 60px); 
        width: 120px;
        background-color: #08785e;
        border-radius: 15px;
        color: white;
        border: #08785e;
        padding: 2px 10px; 
    }

    .video:hover + button span{
        display: none;
    }

    .video:hover + button:before {
        width: 120px;
        border-radius: 15px;
        color: white;
        border: #08785e;
        padding: 2px 10px; 
        content:"Watch Now";
        font-size:15px;
    }

    .video-title {
    color: green;
    font-size: 20px;
    margin-top: 5px;
    }

    .video-description {
        width: 300px;
    }

    .play {
        height: 15px;
        width: 15px;
    }
</style>