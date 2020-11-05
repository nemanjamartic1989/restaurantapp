<template>
    <div class="wrapper menu__container">
        <div class="row">
            <div class="col-md-8">
                <card-component>
                    <template slot="title">My Menu</template>
                    <template slot="body">
                        <div class="section">
                            <multiselect 
                                :options="categories"
                                v-model="menu">
                            </multiselect>
                        </div>
                        <menu-group :items="currentMenuItems"></menu-group>
                    </template>
                </card-component>
            </div>
            <div class="col-md-4">
                <card-component>
                    <template slot="title">Add menu item</template>
                    <template slot="main">
                        <menu-add-form 
                        :categories="categories"
                        :resto_id="resto_id"
                        v-on:newMenuItemAdded="handleNewMenuItem">
                    </menu-add-form>
                    </template>
                </card-component>
            </div>
        </div>
    </div>
</template>

<script>
    import _ from 'lodash';
    import Multiselect from 'vue-multiselect';
    import MenuGroup from './MenuGroups.vue';
    import MenuAddForm from './MenuAddForm.vue';
    export default{
        props: ['items'],
        components: {
            Multiselect, MenuGroup, MenuAddForm
        },
        created() {
            _.forEach(this.items, (item, key) => {
                this.categories.push(key);
            });
            this.menu = this.categories[0];
            this.localItems = this.items;
        },
        data() {
            return {
                localItems: {},
                categories: [],
                menu: ''
            }
        },
        computed: {
            currentMenuItems() {
                return this.localItems[this.menu];
            }
        },
        methods: {
            handleNewMenuItem(item, category) {
                console.log('item', item);
                this.localItems[category].unshift(item);
            }
        }
    }
</script>