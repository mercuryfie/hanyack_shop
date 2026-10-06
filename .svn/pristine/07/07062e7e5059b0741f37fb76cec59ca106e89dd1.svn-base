const common_m = {
    /*
    Use > 약재정보 로드
    Prams > id,pwd
    return >
     */
    async Process_Login(params){
        const res = await commonPublicRequest('/Process_Login',params);
        if (!res) return null;
        const [item = {}] = res.data || [];
        return {
            rUrl: item.rUrl || ''
        };
    }

};

window.common_m = common_m;