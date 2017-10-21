function NoticeList(datagrid, url){
    if(!datagrid || typeof(datagrid)!=='string'&&datagrid.trim()!==''){
        throw new Error("datagrid不能为空！");
    }
    this._datagridId = '#'+datagrid;
    this.getUrl = function(){
        return url;
    }
}

NoticeList.prototype.init = function(){

    this._datagrid=$(this._datagridId).datagrid({
        url:this.getUrl()+"/notice/get-notice-data"
    });
}

