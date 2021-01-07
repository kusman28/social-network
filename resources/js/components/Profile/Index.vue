<template>
    <div class="w-full md:w-1/2 h-full overflow-y-scroll">
        <div class="px-5 py-3 border-b border-lighter flex items-center justify-between">
            <h1 class="text-xl font-bold">Profile</h1>
            <ion-icon name="person" class="text-gray-700"></ion-icon>
        </div>
        <div class="font-sans leading-tight min-h-screen bg-grey-lighter p-8">
            <div class="mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
                <div class="bg-cover h-40" v-bind:style="{ backgroundImage: 'url(' + getProfileCover() + ')' }"></div>
                <div class="border-b px-4 pb-6">
                    <div class="text-center sm:text-left sm:flex mb-4">
                        <img class="h-32 w-32 rounded-full border-4 border-white -mt-16 mr-4" :src="getProfilePhoto()">
                        <div class="py-2">
                            <h3 class="font-bold text-2xl mb-1">{{ form.name }}</h3>
                            <div class="inline-flex font-semibold text-gray-600 sm:flex items-center">
                                @{{ form.student_no }}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="flex">
                        <button class="flex-1 rounded-full bg-blue-500 text-white antialiased font-bold hover:bg-blue-dark px-4 py-2 mr-2">Follow</button>
                        <button class="flex-1 rounded-full border-2 border-grey font-semibold text-black px-4 py-2">Message</button>
                    </div> -->
                </div>
                <div class="px-4 py-4">
                    <!-- <div class="flex items-center text-grey-darker mb-4">
                        <svg class="h-6 w-6 text-grey mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"/></svg>
                        <span><strong class="text-black">12</strong> Followers you know</span>
                    </div>
                    <div class="flex">
                        <div class="flex flex-row-reverse justify-end mr-2">
                        <img class="border-2 border-white rounded-full h-10 w-10" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                        <img class="border-2 border-white rounded-full h-10 w-10 -mr-2" src="https://randomuser.me/api/portraits/women/31.jpg" alt="">
                        <img class="border-2 border-white rounded-full h-10 w-10 -mr-2" src="https://randomuser.me/api/portraits/men/33.jpg" alt="">
                        <img class="border-2 border-white rounded-full h-10 w-10 -mr-2" src="https://randomuser.me/api/portraits/women/32.jpg" alt="">
                        <img class="border-2 border-white rounded-full h-10 w-10 -mr-2" src="https://randomuser.me/api/portraits/men/44.jpg" alt="">
                        <img class="border-2 border-white rounded-full h-10 w-10 -mr-2" src="https://randomuser.me/api/portraits/women/42.jpg" alt="">
                        </div>
                        <span class="flex items-center justify-center text-sm text-grey-darker font-semibold border-2 border-grey-light rounded-full h-10 w-10">+3</span>
                    </div> -->
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea consectetur illum sint maiores non minus placeat repudiandae perferendis repellendus ipsum!</p>
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
    export default {
        data() {
            return {
                user: {},
                form: new Form({
                    id: '',
                    name: '',
                    email: '',
                    student_no: '',
                    profile_pic: '',
                    profile_cover: '',
                    password: ''
                })
            }
        },
        methods: {
            profile() {
                axios.get('./user/profile')
                .then(({ data }) => (this.form.fill(data)));
            },
            getProfilePhoto()
            {
                let profile_pic = (this.form.profile_pic.length > 200) ? this.form.profile_pic : "images/profile/" + this.form.profile_pic;
                return profile_pic;
                return "images/profile/"+ this.form.profile_pic;
            },
            getProfileCover()
            {
                let profile_cover = (this.form.profile_cover.length > 200) ? this.form.profile_cover : "images/cover/" + this.form.profile_cover;
                return profile_cover;
                return "images/cover/"+ this.form.profile_cover;
            },
            updateInfo()
            {
                this.form.put('/profile')
                window.location.href = 'committee'
            },
            updateProfile(e)
            {	
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                    this.form.photo = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    console.log('Large file.')
                }
            },
            updateBanner(e)
            {	
                let file = e.target.files[0];
                console.log(file);
                let reader = new FileReader();
                if (file['size'] < 2111775) {
                    reader.onloadend = (file) => {
                    this.form.banner = reader.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    console.log('Large file.')
                }
            }
        },
        created() {
            this.profile()
        }
    }
</script>
<style type="text/css">
    .cover {
        background-position: center center;
		background-size: cover;
        height: 300px;
    }
    .rounded-circle {
        margin-top: -100px;
        height: 150px;
        border-style: solid;
        border-width: medium;
        border-color: white;
    }

    /* Tailwind */
    .h-5 { height: 1.25rem; }
    .w-5 { width: 1.25rem; }
    .h-40 { height: 15rem; }
    .-mt-16 { margin-top: -4rem; }
    .-mt-24 { margin-top: -6rem; }
</style>