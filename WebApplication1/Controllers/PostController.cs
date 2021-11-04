using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using MySql.Data.MySqlClient;
using dto = WebApplication1.Models;

namespace WebApplication1.Controllers
{
    public class PostController : Controller
    {
        private MySqlDatabase MySqlDatabase { get; set; }
        public PostController(MySqlDatabase mySqlDatabase)
        {
            this.MySqlDatabase = mySqlDatabase;
        }

        [HttpPost]
        private void Button_Click(String topic, String title, String text)
        {

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"INSERT INTO tblpost(postTitle,postText) VALUES (@title,@text;";
            cmd.Parameters.AddWithValue("@Text", title);
            cmd.Parameters.AddWithValue("@text", text);

            var recs = cmd.ExecuteNonQuery();
        }
    }
}
