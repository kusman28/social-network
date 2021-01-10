<template>
    <div class="lg:w-1/5 border-r border-lighter px-2 lg:px-6 py-2 flex flex-col justify-between">
        <div>
            <button class="flex items-center h-12 w-12 hover:bg-green-500 text-3x1 rounded-full text-blue mb-3 mt-3 focus:outline-none">
                <img class="rounded-full border border-lighter" src="/images/profile/UZ-Wildcats.jpg" />
                <div class="hidden lg:block ml-4">
                    <p class="text-base font-bold leading-tight"> UZ&nbsp;WILDCATS</p>
                </div>
            </button>
            <!-- <button class="h-12 w-12 hover:bg-green-500 text-3x1 rounded-full text-blue">
                <ion-icon name="logo-twitter" size="large"></ion-icon>
            </button> -->
            <div>
                <router-link :to="id">
                    <button v-for="tab in tabs" :key="tab.id" @click="id = tab.id" :class="`focus:outline-none hover:text-gray-700 flex items-center py-2 px-4 hover:bg-green-200 rounded-full mr-auto mb-3 ${ id === tab.id ? 'text-green-500' : 'text-gray-700'}`">
                        <ion-icon :class="`text-2xl mr-4 text-left`" :name="`${ tab.icon }`" size="large"></ion-icon>
                        <p class="text-lg font-semibold text-left hidden lg:block"> {{ tab.title }} </p>
                    </button>
                </router-link>
            </div>
            <button class="text-white bg-green-500 rounded-full font-semibold focus:outline-none w-12 h-12 lg:h-auto lg:w-full p-3 hover:bg-darkblue-100">
                <p class="hidden lg:block">Post</p>
                <ion-icon name="chatbubble" class="lg:hidden"></ion-icon>
            </button>
        </div>
        <div class="w-full relative">
            <button @click="dropdown = true" class="flex items-center w-full hover:bg-green-500 hover:text-white rounded-full p-2 focus:outline-none">
                <img :src="form.profile_pic" class="w-10 h-10 rounded-full border border-lighter" />
                <div class="hidden lg:block ml-4">
                    <p class="text-sm font-bold leading-tight"> {{form.name}}</p>
                    <p class="text-sm leading-tight"> @{{form.student_no}}</p>
                </div>
                <ion-icon name="chevron-up" class="hidden lg:block ml-auto text-lg"></ion-icon>
            </button>
            <div v-if="dropdown === true" class="absolute bottom-0 left-0 w-64 rounded-lg shadow-md border-lightest bg-white mb-16">
                <router-link to="/profile">
                    <button @click="dropdown = false" class="p-3 flex items-center w-full hover:bg-green-100 hover:text-green p-2 focus:outline-none">
                            <img :src="form.profile_pic" class="w-10 h-10 rounded-full border border-lighter" />
                            <div class="m-auto mr-2">
                                <p class="text-sm font-bold leading-tight"> {{form.name}}</p>
                                <p class="text-sm leading-tight"> Profile</p>
                            </div>
                            <ion-icon name="settings" class="ml-auto text-green text-lg text-gray-700"></ion-icon>
                    </button>
                </router-link>
                <button @click.prevent="logout" class="w-full text-left hover:bg-lightest border-t border-lighter p-3 text-sm focus:outline-none">
                    Logout
                </button>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            form: new Form({
                id: '',
                name: '',
                student_no: '',
                profile_pic: '',
                email: ''
            }),
            tabs: [
                {icon: 'home', title: 'Home', id: 'home' },
                {icon: 'bag', title: 'Lost / Found', id: 'lost-found' },
                {icon: 'megaphone', title: 'Confessions', id: 'confession' },
                {icon: 'notifications', title: 'Notifications', id: 'notification' },
                {icon: 'mail', title: 'Messages', id: 'message' },
            ],
            id: 'home',
            dropdown: false
        }
    },
    methods: {
        getProfilePhoto()
        {
            let profile_pic = (this.form.profile_pic.length > 200) ? this.form.profile_pic : "images/profile/" + this.form.profile_pic;
            return profile_pic;
            return "images/profile/"+ this.form.profile_pic;
        },
        profile() {
            axios.get('./user/profile')
            .then(({ data }) => (this.form.fill(data)));
        },
        logout(){
            axios.post('logout').then(response => {
                if (response.status === 302 || 401) {
                    window.location.href = '/login';
                }
                else {
                // throw error and go to catch block
                }
            }).catch(error => {

            });
        },
    },
    created() {
        this.profile()
    }
}
</script>