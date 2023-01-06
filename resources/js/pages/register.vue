<template>
    <div class="p-3 flex justify-center">
        <div class="w-1/2 py-10 flex flex-wrap justify-center border rounded">
            <h1 class="text-3xl w-full text-center">Register Page</h1>
            <form
                class="flex flex-wrap justify-center p-2"
                @submit.prevent="submit"
            >
                <div class="py-2 w-full">
                    <input
                        type="text"
                        placeholder="Your Awesome Name"
                        v-model="form.name"
                        class="p-2 w-full rounded border shadow"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="email"
                        v-model="form.email"
                        placeholder="Your Awesome Email"
                        class="p-2 w-full rounded border shadow"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="password"
                        v-model="form.password"
                        placeholder="********"
                        class="p-2 w-full rounded border shadow"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="text"
                        v-model="form.password_confirmation"
                        placeholder="confirm password"
                        class="p-2 w-full rounded border shadow"
                    />
                </div>
                <div class="py-2 w-full">
                    <input
                        type="submit"
                        value="Register"
                        class="px-3 py-2 bg-blue-500 rounded shadow border text-white w-full"
                    />
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    middleware: "guest",
    data() {
        return {
            form: {
                email: "",
                name: "",
                password: "",
                password_confirmation: ""
            }
        };
    },
    methods: {
        submit() {
            axios
                .post("/register", this.form)
                .then(res => {
                    window.location = "/";
                })
                .catch(e => console.log(e.response));
        }
    }
};
</script>

<style></style>
