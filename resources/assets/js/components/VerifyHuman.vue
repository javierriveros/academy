<template>
    <div class="form-group">
        <label>
            <span>¿Cuánto es <strong>{{ n1 }}</strong> + <strong>{{ n2 }}</strong></span>

            <input type="number" name="sum" class="form-control" placeholder="Escribe el resultado" id="sum">
        </label>
    </div>
</template>

<script>
export default {
    props: ['form'],
    data () {
        return {
            n1: parseInt(Math.random() * 10) + 1,
            n2: parseInt(Math.random() * 10) + 1,
            sum: this.n1 + this.n2,
            formElement: null
        }
    },
    mounted() {
        this.formElement = document.querySelector(this.form)
        this.formElement.addEventListener('submit', e => {
            e.preventDefault()
            e.stopPropagation()
            
            if (this.verifySum())
                this.formElement.submit()
            else
                alert('La suma no es correcta, intentalo de nuevo')
        })
    },
    methods: {
        verifySum() {
            return parseInt(this.$el.querySelector('#sum').value) == this.sum
        }
    }
}
</script>
