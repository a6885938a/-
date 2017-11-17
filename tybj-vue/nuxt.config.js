module.exports = {
  /*
   ** Headers of the page
   */
  head: {
    title: '西樵天园饼家',
    meta: [{
      charset: 'utf-8'
    }, {
      name: 'viewport',
      content: 'width=device-width, initial-scale=1'
    }, {
      name: 'keywords',
      content: '西樵大饼,天园饼家,西樵论坛,西樵山,旅游大饼,特色手信,传统礼饼,鸡蛋糕,核桃酥,月饼,龙凤礼饼,鸡仔饼,嫁女饼,非物质文化遗产'
    }, {
      name: 'description',
      content: '天园饼家始建于清光绪二十四（1898年）,是首家制作正宗西樵大饼的饼坊,至今已鼎承六代之传承,逾百年历史之久,并荣膺“非物质文化遗产”西樵大饼传承人。天园饼家主经营传统西樵大饼、鸡蛋糕、核桃酥、月饼、龙凤礼饼、鸡仔饼、嫁女饼等更是中外驰名,产品远销海内外。'
    }],
    link: [{
      rel: 'icon',
      type: 'image/x-icon',
      href: '/favicon.ico'
    }]
  },
  /*
   ** Customize the progress bar color
   */
  loading: {
    color: '#a91f24',
    height: '2px'
  },

  //页面过度效果//过度必须带有fade
  //  .fade-enter-active {
  //   transition: all .3s ease;
  // }
  // .fade-leave-active {
  //   transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
  // }
  // .fade-enter, .fade-leave-to
  //  {
  //   transform: translateX(10px);
  //   opacity: 0;
  // }
  transition: {
    name: 'fade',
    mode: 'out-in',
    beforeEnter(el) {
      console.log('Before enter...')
    }
  },
  /*
   ** Build configuration
   */
  build: {
    /*
     ** Run ESLint on save
     */
    extend(config, ctx) {
      if (ctx.dev && ctx.isClient) {
        config.module.rules.push({
          // enforce: 'pre',
          // test: /\.(js|vue)$/,
          // loader: 'eslint-loader',
          // exclude: /(node_modules)/
        })
      }
    }
  },

  generate: {
    routes: [
      '/about'

    ]
  },
  // plugins: [
  //   // copy sw.js  path.resolve(__dirname, 'sw.js所在路径')
  //   new CopyWebpackPlugin([{
  //     from: path.resolve(__dirname, '/src/js/sw.js'),
  //     to: config.build.assetsRoot,
  //     ignore: ['.*']
  //   }])
  // ]
}