<template>
    <main class="-mt-24 pb-8">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="sr-only">Profile</h1>
            <!-- Main 3 column grid -->
            <div class="grid grid-cols-1 items-start gap-4 lg:grid-cols-3 lg:gap-8">
                <!-- Left column -->
                <div class="grid grid-cols-1 gap-4 lg:col-span-2">
                    <!-- Welcome panel -->
                    <section aria-labelledby="profile-overview-title">
                        <div class="overflow-hidden rounded-lg bg-white shadow">
                            <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                            <div class="bg-white p-6">
                                <div class="sm:flex sm:items-center sm:justify-between">
                                    <div class="sm:flex sm:space-x-5 sm:items-center">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" class="w-24 h-24 mx-auto">
                                                <path
                                                    d="M19.071 4.929a9.936 9.936 0 0 0-7.07-2.938 9.943 9.943 0 0 0-7.072 2.938c-3.899 3.898-3.899 10.243 0 14.142a9.94 9.94 0 0 0 7.073 2.938 9.936 9.936 0 0 0 7.07-2.937c3.899-3.898 3.899-10.243-.001-14.143zM12.181 4h-.359c.061-.001.119-.009.18-.009s.118.008.179.009zm6.062 13H16l-1.258 2.516a7.956 7.956 0 0 1-2.741.493 7.96 7.96 0 0 1-2.746-.494L8 17.01H5.765a7.96 7.96 0 0 1-1.623-3.532L6 11 4.784 8.567a7.936 7.936 0 0 1 1.559-2.224 7.994 7.994 0 0 1 3.22-1.969L12 6l2.438-1.625a8.01 8.01 0 0 1 3.22 1.968 7.94 7.94 0 0 1 1.558 2.221L18 11l1.858 2.478A7.952 7.952 0 0 1 18.243 17z"></path>
                                                <path d="m8.5 11 1.5 4h4l1.5-4L12 8.5z"></path>
                                            </svg>
                                        </div>
                                        <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                            <p class="text-xl font-bold text-gray-900 sm:text-2xl">
                                                Football
                                            </p>
                                            <p class="text-sm font-medium text-gray-600">
                                                Latest football fixtures, statistics and more
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="grid grid-cols-1 divide-y divide-gray-200 border-t border-gray-200 bg-gray-50 sm:grid-cols-3 sm:divide-y-0 sm:divide-x">
                                <div v-for="type in gameTypes" :key="type.label"
                                     @click="type.action"
                                     class="px-6 py-5 text-center text-sm font-medium cursor-pointer hover:bg-gray-100">
                                    <span class="text-gray-900">{{ type.label }}</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section aria-labelledby="quick-links-title">
                        <div
                            class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-gray-200 shadow sm:grid sm:grid-cols-2 sm:gap-px sm:divide-y-0">
                            <h2 class="sr-only" id="quick-links-title">Quick links</h2>
                            <div v-for="(fixture, fixtureIndex) in fixtures" :key="fixtureIndex"
                                 :class="[
                                     fixtureIndex === 0 ? 'rounded-tl-lg rounded-tr-lg sm:rounded-tr-none' : '',
                                     fixtureIndex === 1 ? 'sm:rounded-tr-lg' : '',
                                     fixtureIndex === fixtures.length - 2 ? 'sm:rounded-bl-lg' : '',
                                     fixtureIndex === fixtures.length - 1 ? 'rounded-bl-lg rounded-br-lg sm:rounded-bl-none' : '',
                                     'relative group bg-white p-6 focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500'
                                     ]">
                                <div
                                    :class="['action.iconBackground, action.iconForeground', 'rounded-lg inline-flex ring-4 ring-white']">
                                    <img class="h-12" :src="fixture.league.logo" alt="">
                                </div>
                                <div>
                                    <div v-text="fixture.league.name" class="text-lg font-medium"/>
                                    <p v-text="fixture.league.round" class="text-sm text-gray-500"/>

                                    <p class="mt-4 text-sm font-medium text-gray-700">
                                        Starting Time: {{ moment(fixture.fixture.date).format('LTS') }}
                                    </p>

                                    <div class="flex w-full mt-4">
                                        <div
                                            class="w-1/2 flex-col items-center space-y-2 justify-center text-center">
                                            <span class="text-xs text-gray-500">Home</span>
                                            <img class="h-8 mx-auto" :src="fixture.teams.home.logo" alt="">
                                            <div class="font-medium" v-text="fixture.teams.home.name"/>
                                        </div>
                                        <div
                                            class="w-1/2 flex-col items-center space-y-2 justify-center text-center">
                                            <span class="text-xs text-gray-500">Away</span>
                                            <img class="h-8 mx-auto" :src="fixture.teams.away.logo" alt="">
                                            <div class="font-medium" v-text="fixture.teams.away.name"/>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="pointer-events-none absolute top-6 right-6 text-gray-300 group-hover:text-gray-400"
                                    aria-hidden="true">
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right column -->
                <div class="grid grid-cols-1 gap-4">
                    <!-- Announcements -->
                    <section aria-labelledby="announcements-title">
                        <div class="overflow-hidden rounded-lg bg-white shadow">
                            <div class="p-6">
                                <h2 class="text-base font-medium text-gray-900" id="announcements-title">
                                    Transfers
                                </h2>
                                <div class="mt-6 flow-root">
                                    <ul role="list" class="-my-5 divide-y divide-gray-200">
                                        <li
                                            v-for="transfer in transfers"
                                            class="py-5">
                                            <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                                <h3 v-text="transfer.name" class="text-sm font-semibold text-gray-800"/>
                                                <p v-text="transfer.amount"
                                                   class="mt-1 text-sm text-gray-600 line-clamp-2"/>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mt-6">
                                    <a href="#"
                                       class="flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">View
                                        all
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</template>
<script setup>
import {onMounted, ref} from "vue";
import {useRouter, useRoute} from "vue-router";
import moment from "moment";

const router = useRouter()
const currentRoute = useRoute()

const fixtures = ref([])

const getFixtures = status => {

    router.replace({
        path: '/sports/football',
        query: {
            status
        }
    }).then(() => {
        axios.get(route('fixtures', ['ApiFootball', {status}])).then(res => fixtures.value = res.data)
    })
}

const gameTypes = [
    {label: 'Upcoming Games', action: () => getFixtures('NS')},
    {label: 'Live Games', action: () => getFixtures('LIVE')},
    {label: 'Finished Games', action: () => getFixtures('FT')},
]

const transfers = [
    {name: 'D. Higginbotham', amount: '€ 3M'},
    {name: 'Robin van Persie', amount: '€ 5.5M'},
    {name: 'C. Stewart', amount: '€ 450K'},
]

onMounted(() => {
    getFixtures(currentRoute.query.status ?? 'NS')
})

</script>
