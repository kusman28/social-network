<template>
  <div class="w-full md:w-1/2 h-full overflow-y-scroll">
    <div
      class="px-5 py-3 border-b border-lighter flex items-center justify-between"
    >
      <h1 class="text-xl font-bold">Home</h1>
      <ion-icon name="home" class="text-gray-700"></ion-icon>
    </div>
    <div class="px-5 py-3 border-b-8 border-lighter flex">
      <!-- <div class="flex-none">
        <img
          src="/images/UZ-BabyWildCat2018.png"
          class="flex-none w-12 h-12 rounded-full border border-lighter"
        />
      </div> -->
      <form @submit.prevent="savePost" class="w-full px-4 relative">
        <!-- <p class="text-lg text-left leading-tight text-gray-700">
          How's your day Wildcat?
        </p> -->
        <textarea
          v-model="body"
          placeholder="How's your day Wildcat?"
          class="p-5 mt-3 w-full focus:outline-none"
        />
        <div class="flex items-center mt-2">
          <button class="flex hover:bg-lighter p-3">
            <ion-icon name="image" class="text-gray-500"></ion-icon>
          </button>
          <button class="flex hover:bg-lighter p-3">
            <ion-icon name="happy" class="text-gray-500"></ion-icon>
          </button>
          <button
            type="submit"
            class="h-10 px-5 text-white font-semibold bg-green-500 focus:outline-none rounded-full absolute bottom-0 right-0 mr-4"
          >
            Post
          </button>
        </div>
      </form>
    </div>
    <div class="flex flex-col-reverse">
      <div class="flex justify-center" v-if="!posts.length">
        <wildcat-svg></wildcat-svg>
      </div>
      <div v-for="post in posts"
        :key="post.id">
        <!-- <a class="w-full" :href="`post/`+post.slug"> -->
          <div class="w-full p-4 border-b hover:bg-green-100 flex bg-white">
        <div class="flex-none mr-4">
          <img
            :src="post.user.profile_pic"
            class="h-12 w-12 rounded-full flex-none border border-lighter"
          />
        </div>
        <div class="w-full">
          <div class="flex items-center w-full">
            <a :href="post.user.profileLink" class="font-bold text-green-700">{{ post.user.name }}</a>
            <p class="text-sm text-gray-700 text-dark ml-2">@{{post.user.student_no}}</p>
            <!-- Share to Facebook -->
            <!-- <button
              class="flex focus:outline-none hover:text-white rounded-full hover:bg-green-200 p-3 ml-auto"
            >
              <ion-icon
                name="logo-facebook"
                class="text-blue-600 text-xl"
              ></ion-icon>
            </button> -->
          </div>
          <p class="text-sm flex items-center text-gray-500">
            <ion-icon class="mr-1" name="time"></ion-icon>
            {{ post.createdDate }}
          </p>
          <p class="py-2 text-xl">
            {{ post.body }}
          </p>
          <!-- <div class="flex items-center w-full text-gray-700 mt-3">
             <button class="flex focus:outline-none rounded-full hover:bg-green-200 p-3" @click.prevent="likePost(post.id)">
              <div class="flex items-center">
                <ion-icon name="thumbs-up-sharp"></ion-icon>
                <p class="ml-1">{{ totalLike }}</p>
              </div>
            </button>
            <button class="flex focus:outline-none rounded-full hover:bg-green-200 p-3">
              <div class="flex items-center">
                <ion-icon name="thumbs-down-sharp"></ion-icon>
                <p class="ml-1">{{ post.dislike }}</p>
              </div>
            </button>
            <button class="flex focus:outline-none rounded-full hover:bg-green-200 p-3">
              <div class="flex items-center">
                <ion-icon name="chatbubble"></ion-icon>
                <p class="ml-1">2</p>
              </div>
            </button> 
          </div> -->
          <div>
            <div class="mt-3 d-flex">
              <div
                class="px-1"
                v-for="(count, reaction) in reactions_summary"
                :key="reaction"
                v-show="count"
              >
                <img style="width: 20px" :src="image(reaction)" />
                <span class="px-1">{{ count }}</span>
              </div>
            </div>

            <div class="border-top position-relative">
              <div
                class="bg-white border rounded shadow-sm position-absolute"
                style="bottom: 40px"
                v-show="show_reaction_types"
              >
                <button
                  @click="toggleRaction(type)"
                  class="btn bg-light"
                  v-for="type in types"
                  :key="type"
                >
                  <img :src="image(type)" />
                </button>
              </div>

              <button
                @click="show_reaction_types = !show_reaction_types"
                class="btn btn-link"
              >
                <span v-if="auth_reaction">
                  <img :src="image(auth_reaction)" class="w-25" />
                  {{ auth_reaction }}
                </span>
                <span v-else>Like</span>
              </button>
            </div>
          </div>
        </div>
      </div>
        <!-- </a> -->
      </div>
      
    </div>
    <!-- <div
      v-for="follow in following"
      :key="follow.id"
      class="w-full p-4 border-b hover:bg-lighter flex bg-white"
    >
      <div class="flex-none mr-4">
        <img :src="`${follow.src}`" class="h-12 w-12 rounded-full flex-none" />
      </div>
      <div class="w-full">
        <div class="flex items-center w-full">
          <p class="font-semibold">{{ follow.name }}</p>
          <p class="text-sm text-dark ml-2">{{ follow.handle }}</p>
          <p class="text-sm text-dark ml-2">{{ follow.time }}</p>
          <i class="fas fa-angle-down text-dark ml-auto"></i>
        </div>
        <p class="py-2">
          {{ follow.tweet }}
        </p>
        <div class="flex items-center justify-between w-full">
          <div class="flex items-center text-sm text-dark">
            <i class="far fa-comment mr-3"></i>
            <p>{{ follow.comments }}</p>
          </div>
          <div class="flex items-center text-sm text-dark">
            <i class="fas fa-retweet mr-3"></i>
            <p>{{ follow.retweets }}</p>
          </div>
          <div class="flex items-center text-sm text-dark">
            <i class="fas fa-heart mr-3"></i>
            <p>{{ follow.like }}</p>
          </div>
          <div class="flex items-center text-sm text-dark">
            <i class="fas fa-share-square mr-3"></i>
          </div>
        </div>
      </div>
    </div> -->
  </div>
</template>
<script>
import Reactions from '../Reactions.vue';
export default {
  props: ["summary", "reacted"],
  components: { Reactions },
  data() {
    return {
      body: '',
      posts: {},
      totalLike: '',

      show_reaction_types: false,
      types: ["like", "love", "haha", "angry", "sad", "wow"],
      reactions_summary: { ...this.summary },
      auth_reaction: this.reacted ? this.reacted.type : null,
    };
  },
  methods: {
    savePost() {
      axios
        .post("/post/save", { body: this.body })
        .then((res) => {
          this.postData = res.data;
          Event.$emit("added_post", this.postData);
        })
        .catch((e) => {
          console.log(e);
        });
      this.body = "";
    },
    addNewTweet() {
      let newTweet = {
        content: this.tweet.content,
      };
      this.tweets.push(newTweet);
    },
    getUsersPost(){
      axios.get('/posts').then((response => {
        this.posts = response.data;
        this.totalLike = this.posts.user
      }));
    },
    likePost(id = this.post.id) {
      axios.post('/like/'+id, { post: id })
      .then(response =>{
          if (response.data == 'unliked') {
              this.totalLike -= 1;
          } else {
              this.totalLike += 1;
          }
      })
      .catch()
    },

    // Reactions
    image(type) {
      return `/images/reactions/reactions_${type}.png`;
    },
    toggleRaction(reaction) {
      let path = 1;
      let old_reaction = this.auth_reaction;
      axios.post(`/post/${path}/reaction`, { reaction }).catch(() => {
        this.saveReaction(old_reaction, reaction);
      });
      this.show_reaction_types = false;
      this.saveReaction(reaction, old_reaction);
    },
    saveReaction(new_reaction, old_reaction) {
      this.resetReactionsSummary(new_reaction, old_reaction);
      if (this.auth_reaction === new_reaction) {
        this.auth_reaction = null;
        return;
      }
      this.auth_reaction = new_reaction;
    },
    resetReactionsSummary(new_reaction, old_reaction) {
      if (old_reaction) {
        this.reactions_summary[old_reaction]--;
      }
      if (new_reaction && new_reaction !== old_reaction) {
        if (!this.reactions_summary[new_reaction]) {
          this.reactions_summary[new_reaction] = 1;
          return;
        }
        this.reactions_summary[new_reaction]++;
      }
    },
  },
  created() {
    this.getUsersPost();
    Event.$on('added_post', (post) => {
        //unshift -> Add new items to the beginning of an array:
        this.posts.unshift(post);
    });
  }
};
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