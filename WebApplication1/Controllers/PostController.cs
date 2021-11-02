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
        public void Complete(dto.PostIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Completed = STR_TO_DATE(@Date, '%Y/%m/%d') WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.PostId);
            cmd.Parameters.AddWithValue("@Date", DateTime.Now.ToString("yyyy/MM/dd"));

            var recs = cmd.ExecuteNonQuery();
        }
        [HttpPost]
        public void Incomplete(dto.PostIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Completed = NULL WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.PostId);

            var recs = cmd.ExecuteNonQuery();
        }
        [HttpPost]
        public void Archive(dto.PostIdentifier input)
        {
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"UPDATE Tasks SET Archived = STR_TO_DATE(@Date, '%Y/%m/%d') WHERE TaskId = @TaskId;";
            cmd.Parameters.AddWithValue("@TaskId", input.PostId);
            cmd.Parameters.AddWithValue("@Date", DateTime.Now.ToString("yyyy/MM/dd"));

            var recs = cmd.ExecuteNonQuery();
        }

        [HttpPost]
        public string Sms()
        {
            var input = Request.Form["Body"];
            string response = null;

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"INSERT INTO Tasks(Text,Created) VALUES (@Text,STR_TO_DATE(@Date, '%Y/%m/%d'));";
            cmd.Parameters.AddWithValue("@Text", input);
            cmd.Parameters.AddWithValue("@Date", DateTime.Now.ToString("yyyy/MM/dd"));

            var recs = cmd.ExecuteNonQuery();

            if (recs == 1)
                response = "OK";
            else
                response = "Sorry! I didn't get that.";

            return response;
        }
    }
}
