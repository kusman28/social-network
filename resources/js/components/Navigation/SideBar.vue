<template>
    <div class="lg:w-1/5 border-r border-lighter px-2 lg:px-6 py-2 flex flex-col justify-between">
        <div>
            <button class="h-12 w-12 hover:bg-green-500 text-3x1 rounded-full text-blue">
                <ion-icon name="logo-twitter" size="large"></ion-icon>
            </button>
            <div>
                <button v-for="tab in tabs" @click="id = tab.id" :class="`focus:outline-none hover:text-green-200 flex items-center py-2 px-4 hover:bg-green-500 rounded-full mr-auto mb-3 ${ id === tab.id ? 'text-green-500' : ''}`">
                    <ion-icon :class="`text-2xl mr-4 text-left`" :name="`${ tab.icon }`" size="large"></ion-icon>
                    <p class="text-lg font-semibold text-left hidden lg:block"> {{ tab.title }} </p>
                </button>
            </div>
            <button class="text-white bg-green-500 rounded-full font-semibold focus:outline-none w-12 h-12 lg:h-auto lg:w-full p-3 hover:bg-darkblue-100">
                <p class="hidden lg:block">Post</p>
                <ion-icon name="chatbubble" class="lg:hidden"></ion-icon>
            </button>
        </div>
        <div class="w-full relative">
            <button @click="dropdown = true" class="flex items-center w-full hover:bg-green-500 hover:text-white rounded-full p-2 focus:outline-none">
                <img src="/images/UZ-BabyWildCat2018.png" class="w-10 h-10 rounded-full border border-lighter" />
                <div class="hidden lg:block ml-4">
                    <p class="text-sm font-bold leading-tight"> Lasa</p>
                    <p class="text-sm leading-tight"> @Developer</p>
                </div>
                <ion-icon name="chevron-down" class="hidden lg:block ml-auto text-lg"></ion-icon>
            </button>
            <div v-if="dropdown === true" class="absolute bottom-0 left-0 w-64 rounded-lg shadow-md border-lightest bg-white mb-16">
                <button @click="dropdown = false" class="p-3 flex items-center w-full hover:bg-green-100 hover:text-green p-2 focus:outline-none">
                    <img src="/images/UZ-BabyWildCat2018.png" class="w-10 h-10 rounded-full border border-lighter" />
                    <div class="ml-4">
                        <p class="text-sm font-bold leading-tight"> Lasa</p>
                        <p class="text-sm leading-tight"> @Developer</p>
                    </div>
                    <ion-icon name="checkmark" class="ml-auto text-green"></ion-icon>
                </button>
                <button @click="dropdown = false" class="w-full text-left hover:bg-lightest border-t border-lighter p-3 text-sm focus:outline-none">
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
            tabs: [
                {icon: 'home', title: 'Home', id: 'home' },
                {icon: 'megaphone', title: 'Shoutout', id: 'shoutout' },
                {icon: 'notifications', title: 'Notifications', id: 'notification' },
                {icon: 'mail', title: 'Messages', id: 'message' },
            ],
            id: 'home',
            dropdown: false
        }
    }
}
</script>