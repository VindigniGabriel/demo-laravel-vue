<template>
  <el-card v-if="user.name">
    <div class="user-profile">
      <div class="user-avatar box-center">
        <pan-thumb :image="user.avatar" :height="'100px'" :width="'100px'" :hoverable="false" />
      </div>
      <div class="box-center">
        <div class="user-name text-center">Gabriel Medina Vindigni</div>
        <div class="user-role text-center text-muted">{{ getRole() }}</div>
      </div>
      <div class="box-social">
        <el-table :data="social" :show-header="false">
          <el-table-column prop="name" label="Name" />
          <el-table-column label="description" width="300">
            <template slot-scope="scope">
              <a v-if="scope.row.link" :href="scope.row.description" target="_blank">view</a>
              <a v-else>{{ scope.row.description }}</a>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </el-card>
</template>

<script>
import PanThumb from '@/components/PanThumb';

export default {
  components: { PanThumb },
  props: {
    user: {
      type: Object,
      default: () => {
        return {
          name: '',
          email: '',
          avatar: '',
          roles: [],
        };
      },
    },
  },
  data() {
    return {
      social: [
        {
          name: 'Email',
          description: 'vindignigb@gmail.com',
          link: false,
        },
        {
          name: 'Linkedin',
          description: 'https://www.linkedin.com/in/gabriel-medina-vindigni',
          link: true,
        },
      ],
    };
  },
  methods: {
    getRole() {
      const roles = this.user.roles.map(value =>
        this.$options.filters.uppercaseFirst(value)
      );
      return roles.join(' | ');
    },
  },
};
</script>

<style lang="scss" scoped>
.user-profile {
  .user-name {
    font-weight: bold;
  }
  .box-center {
    padding-top: 10px;
  }
  .user-role {
    padding-top: 10px;
    font-weight: 400;
    font-size: 14px;
  }
  .box-social {
    padding-top: 30px;
    .el-table {
      border-top: 1px solid #dfe6ec;
    }
  }
  .user-follow {
    padding-top: 20px;
  }
}
</style>
