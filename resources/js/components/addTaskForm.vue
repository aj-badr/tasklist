<template>
    <div class="bg-white rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-2">add Task</h2>
        <div class="flex space-x-4">
            <input class="border p-2 rounded w-full" type="text" placeholder="add title" v-model="task.title" />
            <input class="border p-2 rounded w-full" type="text" placeholder="add description" v-model="task.description" />
            <button class="bg-blue-500 text-white px-4 py-2 rounded" @click="addTask()"> add + </button>
        </div>
    </div>
</template>

<script>
export default {
    data: function (){
        return {
            task: {
                title:"",
                description:""
            }
        }
    },
    methods: {
        addTask(){
            if(this.task.title == ""){
                return;
            }

            axios.post("api/task/store", {
                task: this.task
            })
            .then(response => {
                if (response.status == 201) {
                    this.task.title = "";
                    this.task.description = "";
                    this.$emit("reloadlist");
                }
            })
            .catch( error => {
                console.log(error);
            })
        }

    }
}
</script>
