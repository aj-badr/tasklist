<template>
    <div class="flex items-center">
        <input class="mr-2" type="checkbox" @change="updateCheck()" v-model="task.status" />
        <span class="text-lg font-semibold">{{task.title}}</span>
        <span class="ml-2">{{task.description}}</span>
        <button class="btn-danger ml-3" @click="removeItem()">X</button>
    </div>
</template>

<script>

export default {
    props: ["task"],
    methods: {
        updateCheck() {
            axios.put(`api/task/${this.task._id}`, {
                task: this.task
            })
            .then(res => {
                if (res.status == 200) {
                    this.$emit('taskchanged');
                }
            })
            .catch(error => {
                console.log("error from axios put", errors);
            });
        },
        removeItem() {
            axios
                .delete(`api/task/${this.task._id}`)
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("taskchanged");
                    }
                })
                .catch(error => {
                    console.log("error from axios delete ", error);
                });
        }
    }
}
</script>
