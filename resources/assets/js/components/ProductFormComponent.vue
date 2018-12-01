<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">New Product</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select v-model="category" v-on:change="loadSubCategories" name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            <option v-for="category in categories" v-bind:value="category.id">{{ category.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sub_category_id">SubCategory</label>
                        <select v-model="subcategory" name="sub_category_id" id="sub_category_id" class="form-control">
                            <option value="">Select SubCategory</option>
                            <option v-for="subcategory in subcategories" v-bind:value="subcategory.id">{{ subcategory.name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                categories: [],
                subcategories: [],
                category: '',
                subcategory: '',
            }
        },
        mounted() {
            this.loadCategories()
        },
        methods: {
            loadCategories () {
                axios.get('/api/categories')
                     .then(response => this.categories = response.data)
                     .catch(error => console.log(error))
            },
            loadSubCategories () {
                axios.get(`/api/subcategories/${this.category}`)
                     .then(response => this.subcategories = response.data)
                     .catch(error => console.log(error))
            },
        }
    }
</script>
