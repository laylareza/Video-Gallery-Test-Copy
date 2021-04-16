<template>
  <div class="container">
     <div class="backLink">
        <NuxtLink to="/videos/">
            Back
        </NuxtLink>
     </div>
    
    <div class="video-card-container">
         <div class="heading">
        Video Player
    </div>
        <div class="single-video">
            <div>
                <div :class="'wistia_embed wistia_async_' + this.video_id"></div>
            </div>
            <div class="title">
                {{video.title}}
            </div>
            <div class="description">
                {{video.description}}
            </div>    
        </div>
    </div>
  </div>
</template>


<script>
export default {
    name: 'VideoPlayer',
    props: {
       video: {
           type: Object,
           default:() => {}
       }
    },
    head() {
      return {
        script: [
          {src: 'https://fast.wistia.com/assets/external/E-v1.js'},
        ],
      };
    },
    data() {
      return {
        video_id: '',
        options: {
          videoFoam: true,
          playerColor: '#3b8070',
          playButton: true,
        },
      };
    },
    mounted() {
        window._wq = window._wq || [];
        this.video_id = this.$route.params.id;
        _wq.push({
            id: this.video_id,
            options: this.options,
        });
    },
} 
</script>


<style>
  .container {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
  }

  .video-card-container {
    width: 500px;
    margin: auto auto;
    margin-top:0px;
  }

  .single-video {
    height: 400px;
    width: 650px;
    position: relative; 
  }

  .heading {
      margin-top: 5%;
      margin-bottom: 5%;
      color:#3b8070;
      justify-content: center;
      font-size: 30px;
  }

  .backLink {
      margin-top: 5%;
      font-weight: bold;
  }

  .backLink a {
      color:black;
  }

  .title {
    color: #3b8070;
    font-size: 30px;
    margin-top: 15px;
  }

  .description {
      width: 300px;
  }
</style>
