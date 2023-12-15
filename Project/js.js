
var province = document.getElementById("province");
var city = document.getElementById("city");
var district = document.getElementById("district");
/* 
  两种方式创建元素
  第一种：
  var option=document.createElement("option");
  option.text="上海";
  option.value="sh";
  province.appendChild(option);
  第二种方法：
  var option = new Option("上海","sh");
  province.options.add(option);
 */
/* 这个数组里面存储的是对象 */
var provinceList = [{
        name: "北京市",
        cityList: [{
            name: "市辖区",
            districtList: ["东城区", "西城区"]
        }, {
            name: "县",
            districtList: ["密云县", "延庆县"]
        }]
    },
    {
        name: "四川省",
        cityList: [{
            name: "成都市",
            districtList: ["市辖区","锦江区","青羊区"]
        }, {
            name: "自贡市",
            districtList: ["市辖区","自流井区","贡井区"]
        }]
    }
];
/* provinceList.length有多大，就说明省份有多少个 */
for (var i = 0; i < provinceList.length; i++) {
    /* 这省份加入到第一组options中 */
    /* 下面这个name是一个对象 */
    var option = new Option(provinceList[i].name, provinceList[i].name);
    /* 将新new出来的对象加入到option行列之中 */
    province.options.add(option);
}

/* 监听选中操作   下面这行代码绑定事件 */
/* 当省份选中的时候 */
province.onchange = changeProvince;

function changeProvince() {
    /* 当province改变的时候，就会执行这段代码 */
    /* 一定要清空上一个省份下面的市以及县级别 */
    city.length = 0;
    district.length=0;
    /* province.selectedIndex 这个属性会告诉你选中的第几个，类似一个标号 */
    var cityList = provinceList[province.selectedIndex].cityList;
    for (var i = 0; i < cityList.length; i++) {
        var option = new Option(cityList[i].name, cityList[i].name);
        city.options.add(option);
        /* 这段代码和 省 的加入的那段代码相同 */
    }
    /* 这一行代码也很关键，相当于给了一个选择的默认值，当选择了省以后，就会出来市（上面代码实现的） */
    /* 接下来还会出现县级单位，是下面这行代码所实现的 */
    changeCity();
}

/* 当城市被选中的时候 */
city.οnchange=changeCity;

function changeCity(){
    /* 要求市一下的进行展示 */
    /* 将以前的清零 */
    district.length=0;
    var districtList = provinceList[province.selectedIndex].cityList[city.selectedIndex].districtList;
   for(var i=0;i<districtList.length;i++){
       var option = new Option(districtList[i],districtList[i]);
       district.options.add(option);
   }
}

/* 当不做操作的时候，放一个默认值，就是一打开页面就有的一个默认值 */
changeProvince();
changeCity();
