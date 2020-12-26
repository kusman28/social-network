<template>
    <div class="w-full md:w-1/2 h-full overflow-y-scroll">
      <div class="px-5 py-3 border-b border-lighter flex items-center justify-between">
        <h1 class="text-xl font-bold">Home</h1>
        <i class="far fa-star text-xl text-blue"></i>
      </div>
      <div class="px-5 py-3 border-b-8 border-lighter flex">
        <div class="flex-none">
          <img src="/images/UZ-BabyWildCat2018.png" class="flex-none w-12 h-12 rounded-full border border-lighter"/>
        </div>
        <form v-on:submit.prevent="addNewTweet" class="w-full px-4 relative">
            <p class="text-lg text-left leading-tight text-gray-700">How's your day Wildcat? </p>
            <textarea v-model="tweet.content" placeholder="Meow something..." class="p-5 mt-3 w-full focus:outline-none"/>
            <div class="flex items-center mt-2">
                <button class="flex hover:bg-lighter p-3">
                    <ion-icon name="image" class="text-gray-500"></ion-icon>
                </button>
                <button class="flex hover:bg-lighter p-3">
                    <ion-icon name="happy" class="text-gray-500"></ion-icon>
                </button>
                <button type="submit" class="h-10 px-5 text-white font-semibold bg-green-500 hover:bg-green-800 focus:outline-none rounded-full absolute bottom-0 right-0 mr-4">
                Post
                </button>
            </div>
        </form>
      </div>
      <div class="flex flex-col-reverse">
        <div v-for="tweet in tweets" class="w-full p-4 border-b hover:bg-lighter flex">
          <div class="flex-none mr-4">
            <img src="/images/UZ-BabyWildCat2018.png" class="h-12 w-12 rounded-full flex-none border border-lighter"/>
          </div>
          <div class="w-full">
            <div class="flex items-center w-full">
                <p class="font-bold text-green-700"> Lasa </p>
                <p class="text-sm text-gray-700 text-dark ml-2"> @Developer </p>
                <button class="flex focus:outline-none hover:text-white rounded-full hover:bg-green-200 p-3 ml-auto">
                    <ion-icon name="logo-facebook" class="text-blue-600 text-xl"></ion-icon>
                </button>
            </div>
            <p class="text-sm text-gray-500"> 
                <ion-icon name="time"></ion-icon>
                1 sec ago.
            </p>
            <p class="py-2 text-xl">
              {{ tweet.content }}
            </p>
            <div class="flex items-center w-full text-gray-700 mt-3">
              <div class="flex items-center text-sm text-dark">
                <ion-icon name="heart-circle"></ion-icon>
                <p class="mr-2 ml-1"> 3 </p>
              </div>
              <div class="flex items-center text-sm text-dark">
                <ion-icon name="chatbubble"></ion-icon>
                <p class="mr-2 ml-1"> 2 </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-for="follow in following" class="w-full p-4 border-b hover:bg-lighter flex">
        <div class="flex-none mr-4">
          <img :src="`${follow.src}`" class="h-12 w-12 rounded-full flex-none"/>
        </div>
        <div class="w-full">
          <div class="flex items-center w-full">
            <p class="font-semibold"> {{ follow.name }} </p>
            <p class="text-sm text-dark ml-2"> {{ follow.handle }} </p>
            <p class="text-sm text-dark ml-2"> {{ follow.time }} </p>
            <i class="fas fa-angle-down text-dark ml-auto"></i>
          </div>
          <p class="py-2">
            {{ follow.tweet }}
          </p>
          <div class="flex items-center justify-between w-full">
            <div class="flex items-center text-sm text-dark">
              <i class="far fa-comment mr-3"></i>
              <p> {{ follow.comments }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-retweet mr-3"></i>
              <p> {{ follow.retweets }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-heart mr-3"></i>
              <p> {{ follow.like }} </p>
            </div>
            <div class="flex items-center text-sm text-dark">
              <i class="fas fa-share-square mr-3"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            friends: [
                {src: '/images/UZ-Wildcats.jpg', name: 'Elon Musk', handle: '@teslaBoy'},
                {src: '/images/UZ-Wildcats.jpg', name: 'Adrian Monk', handle: '@detective:)'},
                {src: '/images/UZ-Wildcats.jpg', name: 'Kevin Hart', handle: '@miniRock'}
            ],
            following: [
                {src: '/images/UZ-Wildcats.jpg', name: 'Elon Musk', handle: '@teslaBoy', time: '20 min', tweet: 'Should I just quarantine on mars??', comments: '1,000', retweets: '550', like: '1,000,003'},
                {src: '/images/UZ-Wildcats.jpg', name: 'Kevin Hart', handle: '@miniRock', time: '55 min', tweet: 'Should me and the rock do another sub-par movie together????', comments: '2,030', retweets: '50', like: '20,003'},
                {src: '/images/UZ-Wildcats.jpg', name: 'Elon Musk', handle: '@teslaBoy', time: '1.4 hr', tweet: 'Haha just made a flame thrower. Shld I sell them?', comments: '100,000', retweets: '1,000,002', like: '5,000,003'},
                {src: '/images/UZ-Wildcats.jpg', name: 'Elon Musk', handle: '@teslaBoy', time: '1.4 hr', tweet: 'Just did something crazyyyyyyy', comments: '100,500', retweets: '1,000,032', like: '5,000,103'}
            ],
            tweets: [
                {content: 'It is so nice outside!'}
            ],
            tweet: {content: ''}
        }
    },
    methods: {
    addNewTweet () {
        let newTweet = {
            content: this.tweet.content
        };
        this.tweets.push (newTweet)
        }
    }
}
</script>
<style>
/* width */
::-webkit-scrollbar {
    width: 0.2em;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

/* Handle */
::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
}
</style>