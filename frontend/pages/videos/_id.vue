<template>
    <div>
        <VideoPlayer 
            :video="video"
        />
    </div>
</template>


<script>
    import VideoPlayer from '../../components/VideoPlayer.vue';
    export default {
        data() {
            return {
                video: {
                    title: '',
                    description: ''
                },
            };
        },
        head() {
            return {
                script: [
                {src: 'https://fast.wistia.com/assets/external/E-v1.js', defer: true},
                ],
            };
        },
    
        methods: {
            getVideo() {
                this.video_id = this.$route.params.id;
                fetch('http://localhost:8080/videos/' + this.video_id)
                    .then(response => response.json())
                    .then(responseData => {
                        if (responseData.statusCode === 200) {
                            this.video = responseData.data;
                        }
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            },
        },
        components: {
        VideoPlayer,
        },
        created() {
            this.getVideo();
        },
    }
</script>