<template>
    <div class="col">
        <!-- page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="row">
            <div class="card mx-auto">
                <div v-if="showMessage">
                    <div class="alert alert-success">{{ message }}</div>
                </div>
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form @submit.prevent="getEmployees">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input 
                                            type="search"
                                            v-model.lazy="search"
                                            class="form-control mb-2"
                                            placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <button 
                                            type="submit" 
                                            class="btn btn-primary mb-2">
                                            Search
                                        </button>
                                    </div>
                                    <div class="col">
                                        <select
                                            v-model="selectedDepartment"
                                            name="department" 
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
                            </form>
                        </div>
                        <div>
                            <router-link :to="{ name: 'EmployeesCreate' }" class="btn btn-primary mb-2">Create</router-link>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Department</th>
                                <th scope="col">Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr v-for="employee in employees"  v-bind:key="employee.id"  v-bind:value="employee.id">
                                    <th scope="row">#{{ employee.id }}</th>
                                    <td>{{ employee.first_name }}</td>
                                    <td>{{ employee.last_name }}</td>
                                    <td>{{ employee.address }}</td>
                                    <td>{{ employee.department_id }}</td>
                                    <td>
                                        <router-link
                                            class="btn btn-success"
                                            :to ="{ name: 'EmployeesEdit',
                                                    params: { id: employee.id}
                                                }"
                                        >
                                            Edit
                                        </router-link>
                                        
                                    </td>
                                    <td>
                                        <button 
                                            class="btn btn-danger" 
                                            @click="deleteEmployee(employee.id)">
                                                Delete
                                        </button>
                                    </td>
                                </tr>
                        </tbody>			
                    </table>    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: true,
            selectedDepartment: null,
            search: null,
            departments: []
        }
    },
    //For search 
    watch: {
        search() {
           this.getEmployees();
        },
        selectedDepartment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios
                .get('/api/employees',{ params: {
                    search: this.search,
                    department_id: this.selectedDepartment
                }})
                .then(res => {
                    this.employees = res.data.data
                    // console.log(this.employees)
                }).catch(error => {
                    console.log(error)
                })
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
        deleteEmployee(employeeId) {
            console.log(employeeId);
            axios.delete(`api/employees/`+ employeeId)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getEmployees();
            });
        }
    }
}
</script>

<style>
</style>