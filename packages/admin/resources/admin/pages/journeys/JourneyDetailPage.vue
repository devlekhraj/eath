<template>
    <v-container class="py-6">
        <v-row>
            <v-col cols="12" md="7">
                <v-card class="pa-4">
                    <div>
                        <v-carousel height="420" hide-delimiters>
                            <v-carousel-item v-for="(image, index) in journey.images" :key="index"
                                :src="image"></v-carousel-item>
                        </v-carousel>
                    </div>
                    <div class="pt-2">
                        <h1 class="font-weight-bold mb-2">{{ journey.name }}</h1>
                        <p class="text-subtitle-1 text-grey-darken-1 mb-4">{{ journey.slug }}</p>
                    </div>

                    <v-chip class="mr-2" color="primary" text-color="white">
                        {{ journey.duration_days }} Days / {{ journey.duration_nights }} Nights
                    </v-chip>

                    <v-chip color="success" text-color="white">
                        ${{ journey.price }}
                    </v-chip>

                    <v-divider class="my-6"></v-divider>

                    <h2 class="text-h6 mb-2">Description</h2>
                    <div v-html="journey.description" class="mb-6" />

                    <h2 class="text-h6 mb-2">Itinerary</h2>
                    <v-timeline side="end" density="compact" class="mb-6">
                        <v-timeline-item v-for="(item, index) in journey.itinerary" :key="index"
                            :title="'Day ' + item.sort_order + ': ' + item.title">
                            <div>{{ item.description }}</div>
                        </v-timeline-item>
                    </v-timeline>

                    <h2 class="text-h6 mb-2">Inclusions</h2>
                    <ul class="mb-6">
                        <li v-for="(inc, index) in journey.inclusions" :key="index">
                            {{ inc }}
                        </li>
                    </ul>

                    <h2 class="text-h6 mb-2">Exclusions</h2>
                    <ul class="mb-6">
                        <li v-for="(exc, index) in journey.exclusions" :key="index">
                            {{ exc }}
                        </li>
                    </ul>
                </v-card>
            </v-col>

            <v-col cols="12" md="5">

            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            journey: {
                name: 'Everest Base Camp Trek',
                slug: 'everest-base-camp-trek',
                duration_days: 14,
                duration_nights: 13,
                price: 1500.0,
                description: `<p>Explore the breathtaking Everest region with this unforgettable trek. Traverse through Sherpa villages, cross hanging bridges, and experience panoramic mountain views. This adventure is for those seeking high-altitude experiences, culture, and nature combined in one remarkable journey.</p>`,
                itinerary: [
                    { title: 'Arrival in Kathmandu', description: 'Welcome and transfer to hotel.', sort_order: 1 },
                    { title: 'Flight to Lukla and trek to Phakding', description: 'Short scenic flight and warm-up trek.', sort_order: 2 },
                    { title: 'Trek to Namche Bazaar', description: 'Enter the heart of the Khumbu region.', sort_order: 3 },
                ],
                inclusions: [
                    'Airport pickups and drops',
                    '3-star hotel accommodation in Kathmandu',
                    'All meals during the trek',
                    'Experienced English-speaking guide',
                ],
                exclusions: [
                    'International airfare',
                    'Nepal visa fee',
                    'Personal expenses',
                    'Tips for guides and porters',
                ],
                images: [
                    'https://picsum.photos/seed/pic1/1920/900',
                    'https://picsum.photos/seed/pic2/1920/900',
                    'https://picsum.photos/seed/pic3/1920/900',
                ],
            },
        }
    },
}
</script>

<style scoped>
/* li {
    margin-bottom: 4px;
} */
</style>
