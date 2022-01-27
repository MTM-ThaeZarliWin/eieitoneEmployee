<template>
    <div class="row justify-content-center">
        <div class="d-sm-flex align-item-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create Employees</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Create Country
                        <router-link :to="{name: 'EmployeesIndex'}" class="float-right">Back</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="storeEmployee">
                            <div class="row mb-3">
                                <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                                <div class="col-md-6">
                                    <input 
                                        v-model="form.first_name"
                                        id="first_name" 
                                        type="text" 
                                        class="form-control" 
                                        name="first_name" 
                                        required autocomplete="first_name" 
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="middle_name" class="col-md-4 col-form-label text-md-right">Middle Name</label>

                                <div class="col-md-6">
                                    <input 
                                        v-model="form.middle_name"
                                        id="middle_name" 
                                        type="text" 
                                        class="form-control" 
                                        name="middle_name" 
                                        required autocomplete="middle_name" 
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                                <div class="col-md-6">
                                    <input 
                                        id="last_name" 
                                        v-model="form.last_name"
                                        type="text" class="form-control" 
                                        name="last_name" 
                                        required autocomplete="last_name" 
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-right"name="address">Address</label>

                                <div class="col-md-6">
                                    <input 
                                        id="address" 
                                        v-model="form.address"
                                        type="text" 
                                        class="form-control" 
                                        name="address" 
                                        required autocomplete="Address" 
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                <div class="col-md-6">
                                    <select
                                        v-model="form.country_id"
                                        @change="getStates()" 
                                        class="form-control"
                                        aria-label="Default select example"
                                        >
                                        <option 
                                            v-for="country in countries" 
                                            v-bind:value="country.id" 
                                            v-bind:key="country.id"
                                        >
                                            {{ country.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="state" class="col-md-4 col-form-label text-md-right">State</label>
                                <div class="col-md-6">
                                    <select 
                                        v-model="form.state_id"
                                        @change="getCities()"
                                        name="state_id" 
                                        class="form-control" 
                                        aria-label="Default select example">
                                         <option 
                                            v-for="state in states" 
                                            v-bind:value="state.id" 
                                            v-bind:key="state.id"
                                        >
                                            {{ state.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="department" class="col-md-4 col-form-label text-md-right">Department</label>
                                <div class="col-md-6">
                                    <select 
                                        v-model="form.department_id"
                                        name="department_id" 
                                        class="form-control" 
                                        aria-label="Default select example">
                                         <option 
                                            v-for="department in departments" 
                                            v-bind:value="department.id" 
                                            v-bind:key="department.id"
                                        >
                                            {{ department.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                <div class="col-md-6">
                                    <select
                                        v-model="form.city_id"
                                        name="city_id" 
                                        class="form-control" 
                                        aria-label="Default select example">
                                         <option 
                                            v-for="city in cities" 
                                            v-bind:value="city.id" 
                                            v-bind:key="city.id"
                                        >
                                            {{ city.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="zip_code" class="col-md-4 col-form-label text-md-right">Zip Code</label>
                                <div class="col-md-6">
                                    <input 
                                        v-model="form.zip_code"
                                        id="zip_code" 
                                        type="text" 
                                        class="form-control" 
                                        name="zip_code" 
                                        required autocomplete="zip_code" 
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bd_date" class="col-md-4 col-form-label text-md-right">Birth Date</label>
                                <div>
                                   <datepicker 
                                        value="birthdate"
                                        v-model="form.birthdate"
                                        input-class="form-control" 
                                        placeholder="Birth Date">
                                    </datepicker>
                                </div>     
                            </div>
                            <div class="row mb-3">
                                <label for="date_hired" class="col-md-4 col-form-label text-md-right">Date Hired</label>
                                <div>
                                   <datepicker  
                                        value="date_hired"
                                        v-model="form.date_hired"
                                        input-class="form-control" 
                                        placeholder="Date Hired">
                                    </datepicker>
                                </div>     
                            </div>      
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Store
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>            
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment';
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            siteTitle: "Hello",
            countries: [],
            states: [],
            cities: [],
            departments: [],
            form: {
                first_name: '',
                middle_name: '',
                last_name: '',
                address: '',
                country_id: '',
                state_id: '',
                department_id: '',
                city_id: '',
                zip_code: '',
                birthdate: null,
                date_hired: null
            }
        }
    },
    created() {
        this.getCountries();
        this.getDepartments();
    },
    methods: {
        getCountries() {
            axios.get('/api/employees/countries')
                .then(res => {
                    this.countries = res.data
                }).catch(error =>
                console.log('erros : ',error)
            )  
        },
        getStates() {
            axios
                .get(`/api/employees/`+ this.form.country_id +`/states`)
                .then(response => {
                    this.states = response.data;
                }).catch(error =>
                console.log('erros : ',error)
            )
        },
        getCities() {
            axios
                .get(`/api/employees/`+ this.form.state_id +`/cities`)
                .then(response => {
                    this.cities = response.data;
                }).catch(error =>
                console.log('erros : ',error)
            )
        },
        getDepartments() {
            axios
                .get(`/api/employees/departments`)
                .then(response => {
                    this.departments = response.data;
                }).catch(error =>
                console.log('erros : ',error)
            )
        },
        storeEmployee() {
            axios
                .post(`/api/employees/`,{
                    'first_name': this.form.first_name,
                    'middle_name': this.form.middle_name,
                    'last_name': this.form.last_name,
                    'address': this.form.address,
                    'country_id': this.form.country_id,
                    'state_id': this.form.state_id,
                    'city_id': this.form.city_id,
                    'department_id': this.form.department_id,
                    'zip_code': this.form.zip_code,
                    'birthdate': this.formatDateSubmit(this.form.birthdate),
                    'date_hired': this.formatDateSubmit(this.form.date_hired)
                }).then(res => {
                   this.$router.push({name : 'EmployeesIndex'});
                })

        },
        formatDateSubmit(date) {
            var dt = new Date(date);
            var year = dt.getFullYear();
            var month = dt.getMonth() + 1;
            var day = dt.getDate();
            return year + "-" + month + "-" + day;
        }

    }
};
</script>