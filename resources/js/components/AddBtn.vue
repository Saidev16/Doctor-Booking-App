<template >
    <div>
        <!-- <div class="form-group" > -->
            <input type="text" name="medicine[]" class="form-control  mb-3" v-for="(input,index) in inputs" :key="index"> 
            <span>
                <a style="color:blue;" class="mt-1" href="" @click.prevent="add(index)">Ajouter</a>
                <a style="color:red;" href="" @click.prevent="remove(index)" v-show="index || (!index && inputs.length>1)" >Supprimer</a>
            </span>
        <!-- </div> -->
    </div>
</template>


<script type='text/javascript' >
export default {
    data() {
        return {
            inputs: [{}]
        }
    },
    methods:{
        add(){
            this.inputs.push({
                medicine:''
            })
        },
        remove(index){
            this.inputs.splice(index,1)
        }
    }
}
</script>


