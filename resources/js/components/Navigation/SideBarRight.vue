<template>
    <div class="md:block hidden w-1/3 h-full border-l border-lighter py-2 px-6 overflow-y-scroll relative">
        <input class="pl-12 rounded-full w-full p-5 bg-lighter text-sm focus:outline-none" placeholder="Search Wildcat" />
        <ion-icon name="search" class="absolute left-0 top-1 mt-5 ml-12 text-sm text-light text-gray-700" size="small"></ion-icon>
        <div class="w-full rounded-lg bg-gray-200 p-3 mt-4">
            <div class="flex items-center justify-between p-3"> 
                <p class="text-lg font-bold text-green-500">Today's Trending</p>
            </div>
            <button v-for="trend in trending" class="w-full flex justify-between hover:bg-lighter p-3 border-t border-gray-400">
                <div>
                    <p class="text-xs font-bold text-left leading-tight text-blue-500"> {{ trend.top }}</p>
                    <p class="font-bold text-lg text-left leading-tight text-green-700"> {{ trend.title }}</p>
                    <p class="text-left text-sm leading-tight text-gray-700"> {{ trend.bottom }}</p>
                </div>
                <img :src="`${ trend.avatar }`" class="w-10 h-10 rounded-full border border-lighter" />

            </button>
            <button class="p-3 w-full hover:bg-lighter text-left text-blue border-t border-lighter">
                Show More
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            trending: [
                {avatar: '/images/UZ-Wildcats.jpg', top: '#confession', title: 'Sana Or', bottom: '@2015100631'},
                {avatar: '/images/UZ-Wildcats.jpg', top: '#lost&found', title: 'Permit', bottom: '@2015100631'},
                {avatar: '/images/UZ-Wildcats.jpg', top: '#Lorem', title: 'Lorem', bottom: 'Lorem Ipsum Dolor Sit Amet'},
                {avatar: '/images/UZ-Wildcats.jpg', top: '#Lorem', title: 'Lorem', bottom: 'Lorem Ipsum Dolor Sit Amet'},
                {avatar: '/images/UZ-Wildcats.jpg', top: '#Lorem', title: 'Lorem', bottom: 'Lorem Ipsum Dolor Sit Amet'},
            ]
        }
    }
}
</script>