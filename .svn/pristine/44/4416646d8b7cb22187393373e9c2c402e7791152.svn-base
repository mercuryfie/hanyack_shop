const shop_m = {
    /*
     Use > 약재상 쇼핑몰 삼품로드
     params > pCnt:page당갯수,page:페이지,sorting1: 이름순,등록일순 , sorting2:내림차순,오름차순
     return > list : 데이터 , total:갯수, totalRs :전체갯수,nPage:다음페이지
     */
    async Load_Shop_Medicine(params) {
        const res = await commonRequest('/Load_Shop_Medicine', params);
        if (!res) return { list : [],total : 0,totalRs : 0,nPage :0};
        const [item = {}] = res.data || [];
        return {
            list: item.list || [],
            total: item.tcnt || 0,
            totalRs : item.totalRs || 0,
            nPage : item.nPage ||0
        };
    },

};

window.shop_m = shop_m;