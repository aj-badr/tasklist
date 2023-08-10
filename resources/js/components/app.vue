<template>
    <div class="bg-gray-100 min-h-screen">
        <div class="container mx-auto py-6">
            <h1 class="text-2xl font-semibold text-red-500 mb-4">Task List</h1>
            <add-task-form v-on:reloadlist="getTasks()" />
            <div class="mt-6">
                <list-view :tasks="tasks" v-on:reloadlist="getTasks()" />
            </div>
        </div>
    </div>
</template>

<script>
import addTaskForm from "./addTaskForm";
import listView from "./listView";
export default{
    components: {
        addTaskForm,
        listView
    },
    data: function (){
        return{
            tasks:[]
        }
    },
    methods: {
        getTasks() {
            axios.get('api/tasks')
            .then(response =>{
                this.tasks = response.data
            })
            .catch( error => {
                console.log(error);
            })
        }
    },
    created() {
        this.getTasks();
    }

}
</script>
