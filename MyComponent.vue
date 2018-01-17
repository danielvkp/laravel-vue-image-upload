<template>

  <div class="container">

    <h2>Laravel + Vue - Base64 Image Component</h2>

       <form v-on:submit.prevent="save">
                       
          <input v-model="my_model.title" placeholder="Title" name="title" type="text">
           
          <input type="file" v-on:change="onFileChange">
                          
          <button type="submit">Save</button>          

        </form> 
                          
  </div>

</template>

<script>
    export default {
        data () {
           return{           
             my_model:{
               title:'',
               image:''
             },            
           }
        },       
        methods : {            
            onFileChange(e) {            
                let files = e.target.files || e.dataTransfer.files
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader()               
                reader.onload = (e) => {
                    this.sorteo.image = e.target.result
                };
                reader.readAsDataURL(file)               
            },
            save: function(){               
                axios.post('api/save', this.my_model).then(response => {
                       console.log(response.data)                       
                    }, response => {
                        console.log(response)    
                    })
                },
            },
        }
</script>

