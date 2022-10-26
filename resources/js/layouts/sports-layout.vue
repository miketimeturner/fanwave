<template>
    <div class="min-h-full">
        <Popover as="header" class="bg-gradient-to-r from-sky-800 to-cyan-600 pb-24" v-slot="{ open }">
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="relative flex flex-wrap items-center justify-center lg:justify-between">
                    <!-- Logo -->
                    <div class="absolute left-0 flex-shrink-0 py-5 lg:static">
                        <a href="#">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto invert"
                                 src="https://fanwave.digital/wp-content/uploads/2020/07/cropped-Logo.png"
                                 alt=""/>
                        </a>
                    </div>

                    <!-- Right section on desktop -->
                    <div class="hidden lg:ml-4 lg:flex lg:items-center lg:py-5 lg:pr-0.5">
                        <button type="button"
                                class="flex-shrink-0 rounded-full p-1 text-cyan-200 hover:bg-white hover:bg-opacity-10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <BellIcon class="h-6 w-6" aria-hidden="true"/>
                        </button>

                        <!-- Profile dropdown -->
                        <Menu as="div" class="relative ml-4 flex-shrink-0">
                            <MenuButton type="button"
                                    class="flex-shrink-0 rounded-full p-1 text-cyan-200 hover:bg-white hover:bg-opacity-10 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <UserIcon class="h-6 w-6" aria-hidden="true"/>
                            </MenuButton>
                            <transition leave-active-class="transition ease-in duration-75"
                                        leave-from-class="transform opacity-100 scale-100"
                                        leave-to-class="transform opacity-0 scale-95">
                                <MenuItems
                                    class="absolute -right-2 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                    <MenuItem
                                        class="cursor-pointer"
                                        v-for="item in userNavigation"
                                        :key="item.name"
                                        @click="item.action"
                                        v-slot="{ active }"
                                    >
                                        <span
                                            v-text="item.name"
                                            :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']"
                                        />
                                    </MenuItem>
                                </MenuItems>
                            </transition>
                        </Menu>
                    </div>

                    <div class="w-full py-5 lg:border-t lg:border-white lg:border-opacity-20">
                        <div class="lg:grid lg:grid-cols-3 lg:items-center lg:gap-8">
                            <!-- Left nav -->
                            <div class="hidden lg:col-span-2 lg:block">
                                <nav class="flex space-x-4">
                                    <div v-for="item in navigation" :key="item.name"
                                       :class="[item.current ? 'text-white' : 'text-cyan-100', 'text-sm font-medium rounded-md bg-white bg-opacity-0 px-3 py-2 hover:bg-opacity-10 cursor-pointer']"
                                       :aria-current="item.current ? 'page' : undefined">{{ item.name }}</div>
                                </nav>
                            </div>
                            <div class="px-12 lg:px-0">
                                <!-- Search -->
                                <div class="mx-auto w-full max-w-xs lg:max-w-md">
                                    <label for="search" class="sr-only">Search</label>
                                    <div class="relative text-white focus-within:text-gray-600">
                                        <div
                                            class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                                            </svg>

                                        </div>
                                        <input id="search"
                                               class="block w-full rounded-md border border-transparent bg-white bg-opacity-20 py-2 pl-10 pr-3 leading-5 text-white placeholder-white focus:border-transparent focus:bg-opacity-100 focus:text-gray-900 focus:placeholder-gray-500 focus:outline-none focus:ring-0 sm:text-sm"
                                               placeholder="Search" type="search" name="search"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </Popover>
        <router-view/>
        <footer>
            <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
                <div class="border-t border-gray-200 py-8 text-center text-sm text-gray-500 sm:text-left"><span
                    class="block sm:inline">&copy; 2021 Fanwave.</span> <span class="block sm:inline">All rights reserved.</span>
                </div>
            </div>
        </footer>
    </div>
</template>

<script setup>
import {
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
    Popover,
} from '@headlessui/vue'

import {
    BellIcon,UserIcon
} from '@heroicons/vue/outline'

const navigation = [
    {name: 'Football', href: '#', current: true},
    {name: 'Basketball', href: '#', current: false},
    {name: 'Baseball', href: '#', current: false},
    {name: 'Hockey', href: '#', current: false},
]

const logout = () => {
    axios.post(route('logout')).then(() => {
        window.location.reload()
    })
}

const userNavigation = [
    {name: 'Sign out', action: logout},
]
</script>
