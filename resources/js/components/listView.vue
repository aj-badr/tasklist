<template>
  <div class="mt-4">
      <div class="bg-white rounded-lg p-4 mb-2 flex items-center" v-for="(task, index) in tasks" :key="index">
          <list-task :task="task" v-on:taskchanged="$emit('reloadlist')"/>
      </div>
  </div>
</template>

<script>
import listTask from "./listTask";
export default {
    components: {
        listTask
    },
    props:['tasks']

}
</script>
