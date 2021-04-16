<template>
  <div class="container">
    <div class="select-container">
      <select>
        <option value="0">Video Filter</option>
        <option value="1">Video Option 1</option>
        <option value="2">Video Option 2</option>
        <option value="3">Video Option 3</option>
        <option value="4">Video Option 4</option>
        <option value="5">Video Option 5</option>
        <option value="6">Video Option 6</option>
        <option value="7">Video Option 7</option>
        <option value="8">Video Option 8</option>
      </select>
    </div>
    <div class="video-cards-container">
      <VideoSummary 
        v-for="video in videos" 
        :key="video.id" 
        :video="video"
      />
    </div>
    <button class="more-btn" v-on:click="getMoreVideos"> More Videos </button>
  </div>
</template>


<script>
import VideoSummary from '../../components/VideoSummary.vue';
export default {
  data() {
    return {
      videos: null,
      allVideos: null,
      username:''
    };
  },
  mounted() {
    this.username = this.$store.getters['login/getCurrentUsername'];
    if (this.username == "") {
      this.$router.push({
              path: '/login',
            });
    } else {
      this.$store.commit('login/setCurrentUsername', this.username);
    }
  },
  methods: {
    getVideos() {
      fetch('http://localhost:8080/videos')
      .then(response => response.json())
      .then(responseData => {
        if (responseData.statusCode === 200) {
            var allVideos = [];
              var i = 0;
            for (var i in responseData.data) {
                allVideos.push(responseData.data[i]);
            }
          this.allVideos = allVideos;
          this.videos = allVideos.slice(0, 6);
        }
      })
      .catch((error) => {
        console.error('Error:', error);
      });
    },

    getMoreVideos() {
      this.videos = this.allVideos.slice(6, this.allVideos.lentgh);
    }
  },
  components: {
    VideoSummary,
  },
  created() {
    this.getVideos();
  },
}
</script>


<style>
  .container {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
  }

  .select-container {
    margin-top: 50px;
    width: 50px;
  }

  .select-container select {
    width: 340px;
    height: 30px;
    background:none;
    overflow: hidden;
    margin-bottom: 20px;
  }

  .select-container select option {
    background:none;
    -webkit-appearance:none;
  }

  .video-cards-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    
  }

  .more-btn {
    width: 20%;
    border-radius: 20px;
    background-color: orangered;
    margin:auto auto;
    border:none;
  }
</style>
