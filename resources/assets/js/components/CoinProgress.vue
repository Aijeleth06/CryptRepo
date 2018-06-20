<template>
    <div>
        <div class="progress">
          <progressbar :now="progress" type="success" striped animated></progressbar>
        </div>

    <div class="coin-status">
        <strong>Coin Price:</strong> {{ coinNew }}
    </div>
    </div>
</template>

<script>
    import { progressbar } from 'vue-strap'

    export default {
        components: {
            progressbar
        },

        props: ['status', 'initial', 'coin_id'],

        data() {
            return {
                coinNew: this.status,
                progress: this.initial
            }
        },
        mounted() {
            Echo.private('c-t.' + this.wallet_id)
            .listen('CPC', (wallet) => {
              this.coinNew = wallet.coin_name
              this.progress = wallet.coin_value
            });
        }
    }
</script>
